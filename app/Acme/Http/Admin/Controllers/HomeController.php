<?php
namespace Admin\Controllers;
use \Model\Order\ModelName as Order;
use Model\Category\ModelName as Category;
use Model\Subcategory\ModelName as Subcategory;

class HomeController extends Controller {

	public function __construct()
	{
	}
	public function Home()
	{
		$perPage = 10;
        $categories = Category::lists('name', 'id')->toArray();
        $subcategories = Subcategory::lists('name', 'id')->toArray();
        $orders = \Model\Order\ModelName::where('status','<>','softDelete')->orderBy('id', 'desc')->paginate($perPage);

        return view('Admin::order.index', [
            'perPage' => $perPage,
            'orders' => $orders,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
		
	}
	public function History()
	{
		return view('Admin::layouts.history');
	}

}