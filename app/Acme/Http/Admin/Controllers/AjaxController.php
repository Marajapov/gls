<?php

namespace Admin\Controllers;

use Request;
use Input;
use App\Http\Requests;
use Model\Subcategory\ModelName as Subcategory;
use Model\Category\ModelName as Category;
use Model\UserSubcategoryTie\ModelName as UserSubcategoryTie;
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
            $subcategories = UserSubcategoryTie::where('user_id','=',$user->id)->get();
            
            $userList = '';

            foreach($subcategories as $row)
            {
                $userList .= '<span class="spec">'.$row->subcategories()->first()->getName() .'</span>'.'<br />';
            }

            return '
            <tr>
                <td>
                    <a href="#">'.$user->name.'</a>
                </td>
                <td>
                    '.$user->phone.'
                </td>
                <td>
                    <span class="spec">'.$userList.'</span>
                </td>
                <td>
                    '.$user->name.'
                </td>
                <td class="td-actions">
                    <a rel="tooltip" class="delete btn btn-default" href="'.route('admin.order.softDelete', $user->id).'" title="Удалить">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            ';
        }
    }

    public function userChangeStatus(){
        if(Request::ajax()) {
            $data = Input::all();
            if($data['status'] == 'active'){
                User::where('id', $data['id'])->update(['status' => 'blocked']);

        $userId = $data['id'];
        // Sending response to apps
        $response = array();
        $response["command"] = 9;
        $sendMessage = json_encode($response);
        // GET USER LIST
        $gcm_list = array();
        $userGcm = User::where('id','=',$userId)->having('gcm','<>','')->first();
        array_push($gcm_list, $userGcm->gcm);
        // GCM
        $headers = array(
                'Authorization: key= AIzaSyA5JH4mkuGEgLUzHJ2hEGelG4kGYKYddSQ',
                'Content-Type: application/json'
            );
        $fields = array(
                'registration_ids' => $gcm_list,
                'data' => array("message" => $sendMessage),
            );        
        $contentGCM = json_encode($fields);
        $url = 'https://gcm-http.googleapis.com/gcm/send';
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $contentGCM);
        // Execute post
        $resultt = curl_exec($ch);
        if ($resultt === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }    
        // Close connection
        curl_close($ch);
                return 0;
            } elseif($data['status'] == 'blocked') {
                User::where('id', $data['id'])->update([
                    'status' => 'active'
                    ]);

        $userId = $data['id'];
        // Sending response to apps
        $response = array();
        $response["command"] = 8;
        $sendMessage = json_encode($response);
        // GET USER LIST
        $gcm_list = array();
        $userGcm = User::where('id','=',$userId)->having('gcm','<>','')->first();
        array_push($gcm_list, $userGcm->gcm);
        // GCM
        $headers = array(
                'Authorization: key= AIzaSyA5JH4mkuGEgLUzHJ2hEGelG4kGYKYddSQ',
                'Content-Type: application/json'
            );
        $fields = array(
                'registration_ids' => $gcm_list,
                'data' => array("message" => $sendMessage),
            );        
        $contentGCM = json_encode($fields);
        $url = 'https://gcm-http.googleapis.com/gcm/send';
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $contentGCM);
        // Execute post
        $resultt = curl_exec($ch);
        if ($resultt === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }    
        // Close connection
        curl_close($ch);
                return 1;
            }
        }
    }
}
