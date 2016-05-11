<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use \Model\Category\ModelName as Category;
use \Model\Order\ModelName as Order;

class HomeController extends Controller
{

    public function __construct()
    {
    }
    
    public function Home()
    {
        
        $categories = Category::where("published","=","1")->get();

        $orders = Order::where('status','=','new')->orWhere('status','=','share')->orWhere('status','=','complete')->orWhere('status','=','closed')->orderBy('id','desc')->take(10)->get();

        return view('Front::home', [
            'categories' => $categories,
            'orders' => $orders
        ]);
    }
    
    public function verification(){
        return view('Front::verification',[]);
    }
}

