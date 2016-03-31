<?php

Route::group(['prefix' => 'admin', 'middleware' => 'access:admin', 'namespace' => 'Admin\Controllers'], function(){
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'HomeController@Home']);

//    Order Types
    Route::get('order/client',['as'=>'admin.order.client', 'uses'=>'OrderController@clientOrders']);
    Route::get('order/new',['as'=>'admin.order.new', 'uses'=>'OrderController@showNew']);
    Route::get('order/shared',['as'=>'admin.order.shared', 'uses'=>'OrderController@shared']);
    Route::get('order/canceled',['as'=>'admin.order.canceled', 'uses'=>'OrderController@canceled']);
    Route::get('order/closed',['as'=>'admin.order.closed', 'uses'=>'OrderController@showClosed']);

    //rejectUser 
    Route::get('order/rejectUser/{id}/{orderId}',['as' => 'admin.order.rejectUser', 'uses' => 'OrderController@rejectUser']);

    Route::post('user/create', 'AjaxController@categoryChange');
    Route::post('userCategoryChange', ['as'=>'admin.userCategoryChange', 'uses'=>'AjaxController@categoryChange']);
    Route::post('user/create/newSelect', 'AjaxController@newSelect');
    Route::post('user/addSubcategory', ['as'=>'admin.user.addSubcategory', 'uses'=>'UserController@addSubcategory']);
    
    Route::get('user/deleteSubcategory/{id}', ['as'=>'admin.user.deleteSubcategory', 'uses'=>'UserController@deleteSubcategory']);
    Route::get('user/changePassword/{id}', ['as'=>'admin.user.changePassword', 'uses'=>'UserController@changePassword']);
    Route::post('user/newPassword', ['as'=>'admin.user.newPassword', 'uses'=>'UserController@newPassword']);

    Route::post('newUser', ['as'=>'admin.newUser', 'uses'=>'AjaxController@orderNewUser']);

    Route::post('categoryChange',['as' => 'admin.categoryChange', 'uses' => 'AjaxController@orderCategoryChange']);
    Route::post('subcategoryChange', ['as' => 'admin.subcategoryChange', 'uses' => 'AjaxController@subcategoryChange']);
    Route::post('newSelect', ['as' => 'admin.newSelect', 'uses' => 'AjaxController@orderNewSelect']);
    Route::post('userChangeStatus', ['as' => 'admin.userChangeStatus', 'uses' => 'AjaxController@userChangeStatus']);


    Route::get('deleteItem/{id}',['as' => 'deleteItem', 'uses' => 'SubcategoryController@deleteItem']);
    Route::get('order/softDelete/{id}',['as' => 'admin.order.softDelete', 'uses' => 'OrderController@softDelete']);
    Route::get('order/cancel/{id}',['as' => 'admin.order.cancel', 'uses' => 'OrderController@orderCancel']);
    Route::get('order/close/{id}',['as' => 'admin.order.close', 'uses' => 'OrderController@orderClose']);

    // share order
    Route::get('order/share/{id}',['as' => 'admin.order.share', 'uses' => 'OrderController@share']);

//    Resource routes
    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');
    Route::resource('userOrderTie', 'UserOrderTieController');

});
