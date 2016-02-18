<?php
namespace Front\Controllers;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use \Model\Comment\ModelName as Comment;

class HomeController extends Controller
{
    protected $positionTop, $positionRight, $positionCenter, $positionBottom, $positionLeft;
    
    public function __construct()
    {
        //$this->positionBottom = \Model\Banner\ModelName::where('positionBottom','=','1')->first();
    }
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function Home()
    {
        $lc = app()->getlocale();
       
        return view('Front::home', [
            'lc' =>$lc,
            ]);
    }

}

