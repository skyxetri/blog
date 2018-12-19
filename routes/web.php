<?php

use App\Http\Middleware\CheckAdmin;

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
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified','checkadmin');

/*Route::view('/about','about');
*/
Route::middleware(['verified'])->prefix('admin/post')->group(function()
{

Route::post('/','PostController@store')->name('post.store');
Route::get('/create','PostController@create')->name('post.create');
Route::get('/index','PostController@index')->name('post.index');
Route::get('/edit/{id}','PostController@edit')->name('post.edit');
Route::get('/show/{id}','PostController@show')->name('post.show');
Route::post('/update/{id}','PostController@update')->name('post.update');
Route::delete('/delete/{id}','PostController@destroy')->name('post.delete');

});





