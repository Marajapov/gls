<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\Order\ModelName as Order;

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
        return view('Admin::order.create', [
            'order'  => new Order,
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        dd($id);
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
