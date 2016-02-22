<?php

Route::group(['domain' => 'gls.dev', 'prefix' => '/', 'namespace' => 'Front\Controllers'], function() {
    Route::get('/', ['as' => 'front.home',   'uses' => 'HomeController@Home']);
});


Route::group(['prefix' => '/', 'namespace' => 'Front\Controllers'], function() {
    Route::get('login', ['as' => 'front.login',   'uses' => 'AuthController@Login']);
    Route::post('login', ['as' => 'front.login',   'uses' => 'AuthController@postLogin']);
    Route::post('logout', ['as' => 'front.logout',   'uses' => 'AuthController@postLogout']);
    Route::get('search', ['as' => 'front.search', 'uses' => 'HomeController@searchResult']);

    Route::get('locale/{locale?}',   ['as' => 'locale',   'uses' => 'CommonController@setLocale']);

    Route::get('tasks/new',['as'=>'front.tasks.new', 'uses'=>'TaskController@newTask']);
    Route::post('tasks/new', 'AjaxController@selectChange');

});


