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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::namespace('Frontend')->group(function () {
    Route::get('/','HomeController@index');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function () {
    Route::namespace('auth')->group(function () {
        Route::get('/login','LoginController@showLoginForm')->name('admin.login');
        Route::post('/login','LoginController@login')->name('admin.login');
        Route::get('/logout','LoginController@logout')->name('admin.logout');
        Route::get('/register','RegisterController@showRegisterForm')->name('admin.register');
        Route::post('/register','RegisterController@create')->name('admin.register');
    });
    Route::get('/home','HomeController@index');
});


Route::group(['as'=>'admin','prefix'=>'admin','namespace'=>'Backend','middleware'=>['auth:admin','admin']],function () {
    // Route::get('/','HomeController@index');
    Route::namespace('Admin')->group(function () {
        Route::get('/','HomeController@index');
    });
});

Route::group(['prefix'=>'printer','namespace'=>'Backend','middleware'=>['auth:admin','printer']],function () {
    // Route::get('/','HomeController@index');
    Route::namespace('Printer')->group(function () {
        Route::get('/','HomeController@index');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','auth\LoginController@logout')->name('user.logout');
