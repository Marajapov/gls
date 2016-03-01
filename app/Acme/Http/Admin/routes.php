<?php

Route::group(['prefix' => 'admin', 'middleware' => 'access:admin', 'namespace' => 'Admin\Controllers'], function(){
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'HomeController@Home']);

    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');

    Route::post('user/create', 'AjaxController@categoryChange');
    Route::post('user/create/newSelect', 'AjaxController@newSelect');

    Route::post('categoryChange', 'AjaxController@orderCategoryChange');
    Route::post('subcategoryChange', 'AjaxController@subcategoryChange');
    Route::post('newSelect', 'AjaxController@orderNewSelect');
});
