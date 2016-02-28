<?php

Route::group(['prefix' => 'admin', 'middleware' => 'access:admin', 'namespace' => 'Admin\Controllers'], function(){
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'HomeController@Home']);

    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');

    Route::post('user/create', 'AjaxController@categoryChange');
    Route::post('order/create/category', 'AjaxController@orderCategoryChange');
    Route::post('order/create/subcategory', 'AjaxController@subcategoryChange');
    Route::post('user/create/newSelect', 'AjaxController@newSelect');
    Route::post('order/create/newSelect', 'AjaxController@orderNewSelect');
});
