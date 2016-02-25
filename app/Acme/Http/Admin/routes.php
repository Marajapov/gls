<?php

Route::group(['prefix' => 'admin', 'middleware' => 'access:admin', 'namespace' => 'Admin\Controllers'], function(){
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'HomeController@Home']);

    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');

    Route::post('order/create', 'AjaxController@selectChange');
    Route::post('user/create', 'AjaxController@selectChange');
    Route::post('user/create/newSelect', 'AjaxController@newSelect');
});
