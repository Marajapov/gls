<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct()
    {
    }
    public function Home()
    {
        $lc = app()->getlocale();
       
        return view('Front::home', [
            'lc' =>$lc,
            ]);
    }

}

