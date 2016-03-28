<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use \Model\Order\ModelName as Order;
use Model\Category\ModelName as Category;
use Model\Subcategory\ModelName as Subcategory;
use Model\OrderSubcategoryTie\ModelName as OrderSubcategoryTie;
use Model\UserSubcategoryTie\ModelName as UserSubcategoryTie;
use Model\Shared\ModelName as Shared;

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
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->orderBy('id', 'desc')->get();

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
        return view('Admin::order.show', [
            'order' => $order,
            'categories' => $categories,
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
}
