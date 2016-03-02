<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        $lc = app()->getlocale();

        return view('Front::order.index', [
            'lc' =>$lc,
        ]);
    }
    public function newOrder()
    {
        $lc = app()->getlocale();

        return view('Front::order.new', [
            'lc' =>$lc,
        ]);
    }

}

