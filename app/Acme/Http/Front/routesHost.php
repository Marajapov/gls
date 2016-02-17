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

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/balastan', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'balastan.home',   'uses' => 'BalastanController@Home']);
    Route::get('/posts', ['as' => 'balastan.posts',   'uses' => 'BalastanController@posts']);
    Route::get('/photos', ['as' => 'balastan.photos',   'uses' => 'BalastanController@photos']);
    Route::get('/world', ['as' => 'balastan.world',   'uses' => 'BalastanController@world']);
    Route::get('/about', ['as' => 'balastan.about',   'uses' => 'BalastanController@about']);
    //New page video
    Route::get('/video', ['as' => 'balastan.video',   'uses' => 'BalastanController@video']);   

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/muzkanal', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'muzkanal.home',   'uses' => 'HomeController@Muzkanal']);
    Route::get('/posts', ['as' => 'muzkanal.posts',   'uses' => 'MuzkanalController@posts']);
    Route::get('/radio', ['as' => 'muzkanal.radio',   'uses' => 'MuzkanalController@radio']);
    Route::get('/about', ['as' => 'muzkanal.about',   'uses' => 'MuzkanalController@about']);
    Route::get('/video', ['as' => 'muzkanal.video',   'uses' => 'MuzkanalController@video']);
    Route::get('/videos', ['as' => 'muzkanal.videos',   'uses' => 'MuzkanalController@videos']);
    Route::get('/hitparad', ['as' => 'muzkanal.hitparad',   'uses' => 'MuzkanalController@hitparad']);
    Route::get('/photos', ['as' => 'muzkanal.photos',   'uses' => 'MuzkanalController@photos']);
    Route::get('/contacts', ['as' => 'muzkanal.contacts',   'uses' => 'MuzkanalController@contacts']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'ktr.home',   'uses' => 'HomeController@Ktr']);
    Route::get('/posts', ['as' => 'ktr.posts',   'uses' => 'KtrController@posts']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/madaniyat', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'madaniyat.home',   'uses' => 'MadaniyatController@Home']);
    Route::get('/posts', ['as' => 'madaniyat.posts',   'uses' => 'MadaniyatController@posts']);
    Route::get('/about', ['as' => 'madaniyat.about',   'uses' => 'MadaniyatController@about']);
    Route::get('/contacts', ['as' => 'madaniyat.contacts',   'uses' => 'MadaniyatController@contacts']);
    Route::get('/photos', ['as' => 'madaniyat.photos',   'uses' => 'MadaniyatController@photos']);
    Route::get('/broadcasts', ['as' => 'madaniyat.broadcasts',   'uses' => 'MadaniyatController@broadcasts']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'front.home',   'uses' => 'HomeController@Home']);
    Route::get('/posts/general', ['as' => 'front.general',   'uses' => 'HomeController@Posts']);
    Route::get('posts/general/filterResult', ['as' => 'front.filterResult', 'uses' => 'HomeController@filterResult']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/kyrgyzradio', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'kyrgyzradio.home',   'uses' => 'KyrgyzradioController@Home']);
    Route::get('/posts', ['as' => 'kyrgyzradio.posts',   'uses' => 'KyrgyzradioController@posts']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/birinchi', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'birinchi.home',   'uses' => 'BirinchiController@Home']);
    Route::get('/news', ['as' => 'birinchi.news',   'uses' => 'BirinchiController@news']);
    Route::get('/broadcasts', ['as' => 'birinchi.broadcasts',   'uses' => 'BirinchiController@broadcasts']);
    Route::get('/about', ['as' => 'birinchi.about',   'uses' => 'BirinchiController@about']);
    Route::get('/photos', ['as' => 'birinchi.photos',   'uses' => 'BirinchiController@photos']);
    Route::get('/broadcastsprogramm', ['as' => 'birinchi.broadcastsprogramm',   'uses' => 'BirinchiController@broadcastsprogramm']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/dostuk', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'dostuk.home',   'uses' => 'DostukController@Home']);
    Route::get('/posts', ['as' => 'dostuk.posts',   'uses' => 'DostukController@posts']);

});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/minkiyal', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'minkiyal.home',   'uses' => 'MinkiyalController@Home']);
    Route::get('/posts', ['as' => 'minkiyal.posts',   'uses' => 'MinkiyalController@posts']);
    Route::get('/gallery', ['as' => 'minkiyal.gallery',   'uses' => 'MinkiyalController@gallery']);


});

Route::group(['domain' => '1000.ktrk.kg', 'prefix' => '/baldar', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/', ['as' => 'baldar.home',   'uses' => 'BaldarController@Home']);
    Route::get('/posts', ['as' => 'baldar.posts',   'uses' => 'BaldarController@posts']);

});


Route::group(['prefix' => '/', 'namespace' => 'Front\Controllers'], function() {

    Route::get('/post/{post}', ['as' => 'front.post',   'uses' => 'HomeController@Post']);
    Route::get('/page/{page}', ['as' => 'front.page',   'uses' => 'HomeController@Page']);
    Route::get('login', ['as' => 'front.login',   'uses' => 'AuthController@Login']);
    Route::post('login', ['as' => 'front.login',   'uses' => 'AuthController@postLogin']);
    Route::post('logout', ['as' => 'front.logout',   'uses' => 'AuthController@postLogout']);
    Route::get('media', ['as' => 'front.media',     'uses' => 'HomeController@getMedia']);
    Route::get('search', ['as' => 'front.search', 'uses' => 'HomeController@searchResult']);
    
    Route::get('category/{category}', ['as' => 'front.category', 'uses' => 'HomeController@categoryPage']);
    Route::get('category/{category}/filterResult', ['as' => 'front.filterResultCategory', 'uses' => 'HomeController@filterResultCategory']);
    
    Route::get('media', ['as' => 'front.media.index', 'uses' => 'MediaController@mediaIndex']); // List of videos
    Route::get('media/project/{project}', ['as' => 'front.media.project', 'uses' => 'MediaController@project']); // Show Page
    Route::get('media/video/{video}', ['as' => 'front.media.video', 'uses' => 'MediaController@video']); // Show Video



    Route::get('history', ['as' => 'front.history', 'uses' => 'PageController@historyPage']);
    Route::get('director', ['as' => 'front.pages.director', 'uses' => 'PageController@directorPage']);
    Route::get('leaders', ['as' => 'front.pages.leaders', 'uses' => 'PageController@leadersPage']);
//    Route::get('leader/{leader}', ['as' => 'front.pages.leader', 'uses' => 'PageController@leaderPage']);
    Route::get('strategy', ['as' => 'front.pages.strategy', 'uses' => 'PageController@strategyPage']);
    Route::get('normalbase', ['as' => 'front.pages.normalbase', 'uses' => 'PageController@normalbasePage']);
    Route::get('rrts', ['as' => 'front.pages.rrts', 'uses' => 'PageController@rrtsPage']);
    Route::get('report', ['as' => 'front.pages.report', 'uses' => 'PageController@reportPage']);
    Route::get('teleprogram', ['as' => 'front.pages.teleprogram', 'uses' => 'PageController@teleprogramPage']);
//    Route::get('ns', ['as' => 'front.pages.ns', 'uses' => 'PageController@keneshPage']);
    Route::get('editionkenesh', ['as' => 'front.pages.editionkenesh', 'uses' => 'PageController@editionkeneshPage']);

//    BaikoochuKenesh
    Route::get('ns', ['as' => 'front.ns.index', 'uses' => 'NsController@index']);
    Route::get('ns/team', ['as' => 'front.ns.team', 'uses' => 'NsController@team']);
    Route::get('ns/posts', ['as' => 'front.ns.posts', 'uses' => 'NsController@posts']);
    Route::get('ns/post/{post}', ['as' => 'front.ns.post', 'uses' => 'NsController@post']);
    Route::get('ns/galleries', ['as' => 'front.ns.galleries', 'uses' => 'NsController@galleries']);
    Route::get('ns/gallery/{gallery}', ['as' => 'front.ns.gallery', 'uses' => 'NsController@gallery']);
    Route::get('ns/reports', ['as' => 'front.ns.reports', 'uses' => 'NsController@reports']);
    Route::get('ns/contacts', ['as' => 'front.ns.contacts', 'uses' => 'NsController@contacts']);

//    RedakciyaKenesh
    Route::get('rs', ['as' => 'front.rs.index', 'uses' => 'RsController@index']);
    Route::get('rs/about', ['as' => 'front.rs.about', 'uses' => 'RsController@about']);
    Route::get('rs/person/{person}', ['as' => 'front.rs.person', 'uses' => 'RsController@person']);
    Route::get('rs/faq', ['as' => 'front.rs.faq', 'uses' => 'RsController@faq']);
    Route::get('rs/posts', ['as' => 'front.rs.posts', 'uses' => 'RsController@posts']);
    Route::get('rs/post/{post}', ['as' => 'front.rs.post', 'uses' => 'RsController@post']);
    Route::get('rs/procedure', ['as' => 'front.rs.procedure', 'uses' => 'RsController@procedure']);
    Route::get('rs/contacts', ['as' => 'front.rs.contacts', 'uses' => 'RsController@contacts']);

    // Gallery page
    Route::get('/gallery/{gallery}',['as' => 'front.gallery','uses'=> 'HomeController@Gallery']);

Route::get('locale/{locale?}',   ['as' => 'locale',   'uses' => 'CommonController@setLocale']);

});


