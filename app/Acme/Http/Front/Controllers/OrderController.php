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

        return view('Front::tasks.index', [
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

    public function store()
    {

    }

}

