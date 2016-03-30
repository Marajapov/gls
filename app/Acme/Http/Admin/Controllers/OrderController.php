<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use \Model\Order\ModelName as Order;
use Model\Category\ModelName as Category;
use Model\Subcategory\ModelName as Subcategory;
use Model\OrderSubcategoryTie\ModelName as OrderSubcategoryTie;
use Model\UserSubcategoryTie\ModelName as UserSubcategoryTie; // User + SubCategory 
use Model\UserOrderTie\ModelName as UserOrderTie;
use Model\Shared\ModelName as Shared;
use Model\User\ModelName as User;

class OrderController extends Controller
{

    public function index()
    {
        $categories = Category::lists('name', 'id')->toArray();
        $subcategories = Subcategory::lists('name', 'id')->toArray();
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->orderBy('id', 'desc')->get();

        return view('Admin::order.index', [
            'orders' => $orders,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function clientOrders()
    {
        $orders = \Model\Order\ModelName::where('status','=','site')->orderBy('id', 'desc')->get();

        return view('Admin::order.index', [
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        $categories = Category::lists('name', 'id')->toArray();
        $subcategories = Subcategory::lists('name', 'id')->toArray();
        return view('Admin::order.create', [
            'order'  => new Order,
            'categories'  => $categories,
            'subcategories'  => $subcategories,
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->except('q','attachment'));

        OrderSubcategoryTie::create([
            'order_id' => $order->id,
            'category_id' => $order->category_id,
            'subcategory_id' => $order->subcategory_id,
            'count' => $order->count,
            'price' => $order->price,
        ]);

        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $dir  = 'images/attachments';
            $btw = time();

            $name = $order->id().$btw.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['attachment']['tmp_name'])->heighten(300)->save($dir.'/'.$name);

            $fileUrl = asset(''.$dir.'/'.$name);
            $order->url = $fileUrl;
            $order->attachment = $dir.'/'.$name;
            

            $order->save();
        }
        return redirect()->route('admin.order.index');
    }

    public function show($order)
    {
        $categories = Category::lists('name', 'id')->toArray();
        $acceptedUserList = UserOrderTie::where('subcategory_id','=',$order->subcategory_id)->having('order_id','=',$order->id)->get();
        $userList = User::get();

        return view('Admin::order.show', [
            'order' => $order,
            'categories' => $categories,
            'acceptedUserList' => $acceptedUserList,
            'userList' => $userList,
            'newUser' => new UserOrderTie,
        ]);
    }

    public function edit(Order $order)
    {
        $categories = Category::lists('name', 'id')->toArray();
        $subcategories = Subcategory::lists('name', 'id')->toArray();

        $order_id = $order->id;

        return view('Admin::order.edit', [
            'order' => $order,
            'categories'  => $categories,
            'subcategories'  => $subcategories,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->except('q','attachment'));

        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $dir  = 'images/attachments';
            $btw = time();

            $name = $order->id().$btw.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['attachment']['tmp_name'])->heighten(300)->save($dir.'/'.$name);

            $fileUrl = asset(''.$dir.'/'.$name);
            $order->url = $fileUrl;
            $order->attachment = $dir.'/'.$name;
            

            $order->save();
        }
        return redirect()->route('admin.order.show', $order);
    }

    public function softDelete(Request $request, $id)
    {
        $order = Order::where('id','=',$id)->first();
        $order->status = 'softDelete';
        $order->save();
        return redirect()->route('admin.order.index');
    }

    public function destroy($id)
    {
        dd($id);
    }

    // To be shared
    public function share(Request $request, $id)
    {
        $order = Order::where('id','=',$id)->first();
        // Sending response to apps
        $response = array();
        $response["command"] = 1;
        $response["feed"] = array();
        // GET ORDER DETAILS
        $sub_id = 0;            
        $item = Order::where('id','=',$id)->first();
        $snames = Subcategory::where('id','=',$item->subcategory_id)->first();
        $sname = $snames->name;
        $product = array();
        $product["id"] = $id;
        $sub_id = $item["subcategory_id"];
        $product["subcategory"] = $sname;
        $product["description"] = substr($item["description"],0, 100);
        $product["price"] = $item["price"];
        $product["dt"] = date('Y-m-d H:i:s', strtotime($item['updated_at']));
        array_push($response["feed"], $product);
        $sendMessage = json_encode($response);
        // GET USER LIST
        $gcm_list = array();
        $user_query = UserSubcategoryTie::where('subcategory_id','=',$sub_id)->get();
        foreach($user_query as $row)
        {
            $rowGcm = $row->users()->first()->gcm;
            array_push($gcm_list, $rowGcm);
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
        $order->status = 'share';
        $order->save();
        return redirect()->route('admin.order.index');
    }

    // Show shared orders
    public function shared()
    {
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->where('status','=','share')->orderBy('id', 'desc')->get();

        return view('Admin::order.shared', [
            'orders' => $orders,
        ]);
    }
    // To be canceled
    public function orderCancel(Request $request, $id)
    {
        $order = Order::where('id','=',$id)->first();
        $order->status = 'canceled';
        $order->save();
        return redirect()->route('admin.order.index');
    }

    // Show canceled orders
    public function canceled()
    {
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->where('status','=','canceled')->orderBy('id', 'desc')->get();

        return view('Admin::order.canceled', [
            'orders' => $orders,
        ]);
    }

    // To be closed
    public function orderClose(Request $request, $id)
    {
        $order = Order::where('id','=',$id)->first();
        $order->status = 'closed';
        $order->save();
        return redirect()->route('admin.order.index');
    }

    // Show closed orders
    public function showClosed()
    {
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->where('status','=','closed')->orderBy('id', 'desc')->get();

        return view('Admin::order.closed', [
            'orders' => $orders,
        ]);
    }

    // Show new orders
    public function showNew()
    {
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->where('status','=','new')->orderBy('id', 'desc')->get();

        return view('Admin::order.new', [
            'orders' => $orders,
        ]);
    }


    // rejectUser
    public function rejectUser(Request $request, $id, $orderId)
    {
        $table = UserOrderTie::where('user_id','=',$id)->orWhere('order_id','=',$orderId)->first();
        $table->delete();
        return redirect()->route('admin.order.index');
    }
}
