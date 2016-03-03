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

    Route::get('deleteItem/{id}',['as' => 'deleteItem', 'uses' => 'SubcategoryController@deleteItem']);
    Route::get('order/softDelete/{id}',['as' => 'admin.order.softDelete', 'uses' => 'OrderController@softDelete']);
    Route::get('order/cancel/{id}',['as' => 'admin.order.cancel', 'uses' => 'OrderController@softDelete']);
    Route::get('order/close/{id}',['as' => 'admin.order.close', 'uses' => 'OrderController@softDelete']);

    // share order
    Route::get('order/share/{id}',['as' => 'admin.order.share', 'uses' => 'OrderController@share']);

});
