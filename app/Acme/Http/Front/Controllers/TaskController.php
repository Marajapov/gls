<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
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
    public function newTask()
    {
        $lc = app()->getlocale();

        return view('Front::tasks.new', [
            'lc' =>$lc,
        ]);
    }

}

