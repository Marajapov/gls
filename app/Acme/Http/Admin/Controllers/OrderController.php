<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\Order\ModelName as Order;
use Model\Category\ModelName as Category;
use Model\OrderSubcategoryTie\ModelName as OrderSubcategoryTie;

class OrderController extends Controller
{

    public function index()
    {
        $orders = \Model\Order\ModelName::orderBy('id', 'desc')->get();
        
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

    public function show($id)
    {
        return view('Admin::order.show', [
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
