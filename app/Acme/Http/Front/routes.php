<?php

Route::group(['domain' => 'www.gls.dev', 'prefix' => '/', 'namespace' => 'Front\Controllers'], function() {
    Route::get('/', ['as' => 'front.home',   'uses' => 'HomeController@Home']);
});


Route::group(['prefix' => '/', 'namespace' => 'Front\Controllers'], function() {
    Route::get('login', ['as' => 'front.login',   'uses' => 'AuthController@Login']);
    Route::post('login', ['as' => 'front.login',   'uses' => 'AuthController@postLogin']);
    Route::post('logout', ['as' => 'front.logout',   'uses' => 'AuthController@postLogout']);
    Route::get('search', ['as' => 'front.search', 'uses' => 'HomeController@searchResult']);
    Route::get('verification', ['as' => 'front.verification', 'uses' => 'HomeController@verification']);

    Route::get('locale/{locale?}',   ['as' => 'locale',   'uses' => 'CommonController@setLocale']);

    Route::get('order/new',['as'=>'front.order.new', 'uses'=>'OrderController@newOrder']);
    Route::get('order/new/{category}',['as'=>'front.order.new.category', 'uses'=>'OrderController@categoryNewOrder']);
    Route::get('order/',['as'=>'front.order', 'uses'=>'OrderController@index']);
    Route::get('order/all',['as'=>'front.order.all', 'uses'=>'OrderController@index']);
    Route::post('order/categoryChange', ["as"=>"order.categoryChange", "uses"=> "AjaxController@selectChange"]);

    // new order store
    Route::post('order/store',['as' => 'front.order.store', 'uses' => 'OrderController@store']);

    // External authentification
    //Route::get('mobile/test.php?phone={phone}&password={password}',['as' => 'front.test', 'uses' => 'HomeController@postLogin']);

});

?>