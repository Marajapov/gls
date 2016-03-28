<?php

namespace Admin\Controllers;

use Request;
use Input;
use App\Http\Requests;
use Model\Subcategory\ModelName as Subcategory;
use Model\Category\ModelName as Category;
use Model\User\ModelName as User;

class AjaxController extends Controller
{

    // AJAX CALL
    public function categoryChange()
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
    public function orderCategoryChange()
    {
        if(Request::ajax()) {
            $data = Input::all();

            $subcategories = Subcategory::where('category_id','=',$data['id'])->get();
            $subcategoriesResult = "";
            foreach($subcategories as $subcategory){
                $subcategoriesResult .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
            }
            return $result = array([
                'subcategories' => $subcategoriesResult,
                'price' => ''
            ]);
        }
    }
    public function subcategoryChange()
    {
        if(Request::ajax()) {
            $data = Input::all();

            $subcategory = Subcategory::where('id','=',$data['id'])->first();
            return $subcategory->getPrice();
        }
    }

    public function newSelect()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $categories = Category::where('published','=','1')->get();
            $result = '<div id="doer'.$data["i"].'" class="row"><div class="col-md-3"><div class="form-group"><label>Категория</label>';
            $result .= '<select onchange="categoryChange($(\'#category'.$data["i"].'\'), $(\'#subCategory'.$data["i"].'\'));" id="category'.$data["i"].'" name="categories[]" class="form-control selectpicker orderCategory" title="-- Выберите категорию --">';
            foreach($categories as $category){
                $result .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
            $result .= '</select></div></div>';
            $result .= '<div class="col-md-3"><div class="form-group"><label>Подкатегория</label>';
            $result .= '<select  id="subCategory'.$data["i"].'" name="subcategories[]" class="form-control selectpicker" title="-- Выберите категорию --">';
            $result .= '</div></div></div>';

            return $result;
        }
    }
    public function orderNewSelect()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $categories = Category::where('published','=','1')->get();
            $result = '<div id="doer'.$data["i"].'" class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Категория</label>
                                <select onchange="categoryChange($(\'#category'.$data["i"].'\'), $(\'#subCategory'.$data["i"].'\'), $(\'#price'.$data["i"].'\'));" id="category'.$data["i"].'" name="categories[]" class="form-control selectpicker orderCategory" title="-- Выберите категорию --">';
            foreach($categories as $category){
                $result .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
            $result .= '</select></div></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="subCategory'.$data["i"].'">Подкатегория</label>
                                <select onchange="subcategoryChange($(\'#subCategory'.$data["i"].'\'), $(\'#price'.$data["i"].'\'));" id="subCategory'.$data["i"].'" name="subcategories[]" class="form-control selectpicker" title="-- Выберите категорию --">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="count'.$data["i"].'">Количество</label>
                                <input id="count'.$data["i"].'" name="counts[]" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cost'.$data["i"].'">Цена</label>
                                <input id="price'.$data["i"].'" name="prices[]" type="text" class="form-control">
                            </div>
                        </div>
                    </div>';

            return $result;
        }
    }

    public function orderNewUser(){
        if(Request::ajax()) {
            $data = Input::all();
            $user = User::where('id','=',$data['id'])->first();

            return '
            <tr>
                <td>
                    <a href="#">'.$user->name.'</a>
                </td>
                <td>
                    '.$user->phone.'
                </td>
                <td>
                    <span class="spec">uborka1</span>
                    <span class="spec">uborka2</span>
                    <span class="spec">uborka3</span>
                </td>
                <td>
                    '.$user->name.'
                </td>
                <td class="td-actions">
                    <a rel="tooltip" class="delete btn btn-default" href="'.route('admin.order.softDelete', $user) .'" title="Удалить">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            ';
        }
    }
}
