<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use \Model\Category\ModelName as Category;

class HomeController extends Controller
{

    public function __construct()
    {
    }
    public function Home()
    {

        $categories1 = Category::where("published","=","1")->take(4)->get();
        $categories2 = Category::where("published","=","1")->take(4)->skip(4)->get();

        return view('Front::home', [
            'categories1' => $categories1,
            'categories2' => $categories2
        ]);
    }

}

