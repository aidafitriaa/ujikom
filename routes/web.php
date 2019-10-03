<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'FrontendController@index');
// Route::get('contact', 'FrontendController@contact');
// Route::get('catagories', 'FrontendController@catagories');
// Route::get('about', 'FrontendController@about');
// Route::get('single', 'FrontendController@single');

Route::group(['prefix'=>'admin','middleware'=>['auth']],function() {
    Route::get('/', function(){
        return view('admin.index');
    });
});

Route::resource('pembeli','PembeliController');
Route::resource('mobil','MobilController');
Route::resource('cash','CashController');
Route::resource('kredit','KreditController');
Route::resource('paket_kredit','PaketkreditController');
Route::resource('cicilan','BayarcicilanController');