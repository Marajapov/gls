<?php

namespace Front\Controllers;

use Request;
use Input;
use App\Http\Requests;
use \Model\Subcategory\ModelName as Subcategory;

class AjaxController extends Controller
{

    // AJAX CALL
    public function selectChange()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $subcategories = Subcategory::where('category_id','=',$data['id'])->get();
            $result = "";
            foreach($subcategories as $subcategory){
                $result .= '<option value="'.$subcategory["id"].'">'.$subcategory["name"].'</option>';
            }
            return $result;
        }
    }
}
