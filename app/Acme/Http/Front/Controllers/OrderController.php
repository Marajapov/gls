<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use \Model\Order\ModelName as Order;
use \Model\Category\ModelName as Category;

class OrderController extends Controller
{

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
        $categories = Category::where('published','=','1')->get();

        return view('Front::order.new', [
            'order' => new Order,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
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

        return redirect()->route('front.order.new')->with('status','success');
    }

}

