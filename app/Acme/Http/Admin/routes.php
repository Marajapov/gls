<?php

Route::group(['prefix' => 'admin', 'middleware' => 'access:admin', 'namespace' => 'Admin\Controllers'], function(){
    Route::get('/',     ['as' => 'admin.home', 'uses' => 'HomeController@Home']);

    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
});
