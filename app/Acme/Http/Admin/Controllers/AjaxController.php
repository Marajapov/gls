<?php

namespace Admin\Controllers;

use Request;
use Input;
use App\Http\Requests;
use Model\Subcategory\ModelName as Subcategory;
use Model\Category\ModelName as Category;

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
                $result .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
            }
            return $result;
        }
    }
    public function newSelect()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $categories = Category::where('published','=','1')->get();
            $result = '<div id="doer'.$data["i"].'" class="row"><div class="col-md-3"><div class="form-group"><label>Категория</label>';
            $result .= '<select onchange="selectChange($(\'#category'.$data["i"].'\'), $(\'#subCategory'.$data["i"].'\'));" id="category'.$data["i"].'" name="category_id[]" class="form-control selectpicker orderCategory" title="-- Выберите категорию --">';
            foreach($categories as $category){
                $result .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
            $result .= '</select></div></div>';
            $result .= '<div class="col-md-3"><div class="form-group"><label>Подкатегория</label>';
            $result .= '<select  id="subCategory'.$data["i"].'" name="subcategory_id[]" class="form-control selectpicker" title="-- Выберите категорию --">';
            $result .= '</div></div></div>';

//            $subcategories = Subcategory::where('category_id','=',$data['id'])->get();

//            foreach($subcategories as $subcategory){
//                $result .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
//            }

//            <div id="doer'+i+'" class="row"><div class="col-md-3"><div class="form-group"><label>Категория</label></div></div><div class="col-md-3"><div class="form-group"><label>Подкатегория</label><select id="subCategory'+i+'" name="subCategory'+i+'" class="form-control selectpicker" title="-- Выберите категорию --"></select></div></div></div>

            return $result;
        }
    }
}
