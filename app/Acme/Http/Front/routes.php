<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['domain' => 'gls.dev', 'prefix' => '/', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'front.home',   'uses' => 'HomeController@Home']);
    Route::get('/posts/general', ['as' => 'front.general',   'uses' => 'HomeController@Posts']);
    Route::get('posts/general/filterResult', ['as' => 'front.filterResult', 'uses' => 'HomeController@filterResult']);

});


Route::group(['prefix' => '/', 'namespace' => 'Front\Controllers'], function() {
    Route::get('login', ['as' => 'front.login',   'uses' => 'AuthController@Login']);
    Route::post('login', ['as' => 'front.login',   'uses' => 'AuthController@postLogin']);
    Route::post('logout', ['as' => 'front.logout',   'uses' => 'AuthController@postLogout']);
    Route::get('media', ['as' => 'front.media',     'uses' => 'HomeController@getMedia']);
    Route::get('search', ['as' => 'front.search', 'uses' => 'HomeController@searchResult']);


Route::get('locale/{locale?}',   ['as' => 'locale',   'uses' => 'CommonController@setLocale']);

});


