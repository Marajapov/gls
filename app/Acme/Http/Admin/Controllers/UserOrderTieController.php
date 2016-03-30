<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\UserOrderTie\ModelName as UserOrderTie;
use \Model\User\ModelName as User;
use \Model\Order\ModelName as Order;

class UserOrderTieController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
        $categoryList = UserOrderTie::lists('name', 'id')->toArray();
        return view('Admin::subcategory.create', [
            'subcategory'  => new Subcategory,
            'categoryList' => $categoryList,
        ]);
    }

    public function store(Request $request)
    {
        $table = UserOrderTie::create($request->except('q','orderId','user'));
        $orderId = $request->input('orderId');
        $order = Order::where('id','=',$orderId)->first();
        $userId = $request->input('user'); // user id

        $table->order_id = $orderId;
        $table->user_id = $userId;
        $table->save();

        return redirect()->route('admin.order.show',$order);
    }

    public function show($subcategory)
    {
    }

    public function edit(Subcategory $subcategory)
    {
    }

    public function update(Request $request, $subcategory)
    {
    }

    public function destroy(Subcategory $subcategory)
    {
    }
}