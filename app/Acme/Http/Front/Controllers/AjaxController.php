<?php

namespace Front\Controllers;

use Request;
use Input;
use App\Http\Requests;

class AjaxController extends Controller
{

    // AJAX CALL
    public function selectChange()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $types = array(
                [
                    "id"=>1,
                    "name"=>"test101",
                    "parent"=>1
                ],
                [
                    "id"=>2,
                    "name"=>"test102",
                    "parent"=>1
                ],
                [
                    "id"=>3,
                    "name"=>"test201",
                    "parent"=>2
                ],
                [
                    "id"=>4,
                    "name"=>"test202",
                    "parent"=>2
                ]
            );
//            $result = '<option value="0" selected class="hidden">-- Выберите тип --</option>';
            $result = "";
            foreach($types as $type){
                if($type['parent'] == $data['id']){
                    $result .= '<option value="'.$type["id"].'">'.$type["name"].'</option>';
                }
            }
            return $result;
        }
    }
}
