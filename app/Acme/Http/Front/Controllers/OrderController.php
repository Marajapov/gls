<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator as Validator;
use \Model\Order\ModelName as Order;
use \Model\Category\ModelName as Category;
use \Model\Subcategory\ModelName as Subcategory;
use \Model\User\ModelName as User;

class OrderController extends Controller
{
    protected function myValidator(array $data)
    {
        return Validator::make($data, [    
            'captcha' => 'required|captcha',
        ]);

    }

    public function __construct()
    {
    }
    public function index()
    {
        $lc = app()->getlocale();

        return view('Front::order.index', [
            'lc' =>$lc,
        ]);
    }
    public function newOrder()
    {
        $categories = Category::where('published','=','1')
                              ->where('id','<>','1')
                              ->where('id','<>','4')
                              ->where('id','<>','7')
                              ->where('id','<>','10')
                              ->get();

        return view('Front::order.new', [
            'order' => new Order,
            'categories' => $categories
        ]);
    }

    public function categoryNewOrder(Category $selectedCategory)
    {
        $categories = Category::where('published','=','1')
                              ->where('id','<>','1')
                              ->where('id','<>','4')
                              ->where('id','<>','7')
                              ->where('id','<>','10')
                              ->get();

        return view('Front::order.category', [
            'order' => new Order,
            'selectedCategory' => $selectedCategory,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // $validator = $this->myValidator($request->except('attachment','q'));
        // if ($validator->fails()) {            
        //         $this->throwValidationException(
        //             $request, $validator
        //         );
        // }else{

        // }

        $order = Order::create($request->except('attachment','q'));

        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $dir  = 'images/attachments';
            $btw = time();

            $name = $order->id().$btw.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['attachment']['tmp_name'])->heighten(600)->save($dir.'/'.$name);

            $order->attachment = $dir.'/'.$name;
            $order->save();
        }
        $order->status = 'site';
        $order->save();

        // Sending response to Administrators

        $response = array();
        $response["command"] = 5; // for admin
        $response["feed"] = array();
        // GET ORDER DETAILS
        $sub_id = 0;            
        $item = Order::where('id','=',$order->id)->first();
        
        $snames = Subcategory::where('id','=',$item->subcategory_id)->first();
        if($snames == null){
            $sname = '';
        }else{
            $sname = $snames->name;
        }
        $product = array();
        $product["id"] = $order->id;
        $sub_id = $item["subcategory_id"];
        $product["subcategory"] = $sname;
        $product["phone"] = $item["client_phone"];
        $product["price"] = 0;

        $product["name"] = $item["client_name"];
        $product["dt"] = date('Y-m-d H:i:s', strtotime($item['updated_at']));
        array_push($response["feed"], $product);
        $sendMessage = json_encode($response);
        // GET USER LIST
        $gcm_list = array();
        
        $userGlobal = User::where('role','=','admin')->orWhere('role','=','manager')->having('gcm','<>','')->get();
        foreach($userGlobal as $row1)
        {
            array_push($gcm_list, $row1->gcm);
        }
        // GCM
        $headers = array(
                'Authorization: key= AIzaSyA5JH4mkuGEgLUzHJ2hEGelG4kGYKYddSQ',
                'Content-Type: application/json'
            );
        $fields = array(
                'registration_ids' => $gcm_list,
                'data' => array("message" => $sendMessage),
            );        
        $contentGCM = json_encode($fields);
        

        $url = 'https://gcm-http.googleapis.com/gcm/send';
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $contentGCM);
        // Execute post
        $resultt = curl_exec($ch);
        if ($resultt === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }    
        // Close connection
        curl_close($ch);

        return redirect()->route('front.order.new')->with('status','success');
    }

}

