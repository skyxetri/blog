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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
/* social login auth*/
Route::get('login/{pro}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{pro}/callback', 'Auth\LoginController@handleProviderCallback');
Route::view('/admin','dashboard');
Route::view('/about','about');
