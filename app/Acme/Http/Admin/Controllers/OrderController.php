<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\Order\ModelName as Order;
use Model\Category\ModelName as Category;
use Model\OrderSubcategoryTie\ModelName as OrderSubcategoryTie;
use Model\UserSubcategoryTie\ModelName as UserSubcategoryTie;
use Model\Shared\ModelName as Shared;

class OrderController extends Controller
{

    public function index()
    {
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->orderBy('id', 'desc')->get();

        return view('Admin::order.index', [
            'orders' => $orders,
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
        $categories = Category::where('published','=','1')->get();
        return view('Admin::order.create', [
            'order'  => new Order,
            'categories'  => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->except('categories','categories','subcategories','prices','counts','prices','q'));

        $categories = $request->input('categories');
        $subcategories = $request->input('subcategories');
        $counts = $request->input('counts');
        $prices = $request->input('prices');
        for($i=0;$i<count($subcategories);$i++){
            OrderSubcategoryTie::create([
                'order_id' => $order->id,
                'category_id' => $categories[$i],
                'subcategory_id' => $subcategories[$i],
                'count' => $counts[$i],
                'price' => $prices[$i],
            ]);
        }

        return redirect()->route('admin.order.index');

    }

    public function show($order)
    {
        return view('Admin::order.show', [
            'order' => $order,
        ]);
    }

    public function edit(Order $order)
    {
        $categories = Category::where('published','=','1')->get();
        $order_id = $order->id;
        $order_ties = OrderSubcategoryTie::where('order_id','=',$order_id)->get();
        return view('Admin::order.edit', [
            'order' => $order,
            'categories'  => $categories,
            'order_ties' => $order_ties,
        ]);
    }

    public function update(Request $request, $id)
    {
        //
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

        // insert into ust
        $ost = OrderSubcategoryTie::where('order_id','=',$id)->get();
        foreach ($ost as $key => $value) {
            Shared::create([
                'order_id' => $value['order_id'],
                'subcategory_id' => $value['subcategory_id'],
                'count' => $value['count'],
                'price' => $value['price'],
            ]);
        }
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
