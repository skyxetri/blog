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
Route::middleware(['verified'])->prefix('admin')->group(function()
{

Route::post('post','PostController@store')->name('post.store');
Route::get('post/create','PostController@create')->name('post.create');
Route::get('post/index','PostController@index')->name('post.index');
Route::get('post/edit/{id}','PostController@edit')->name('post.edit');
Route::get('post/show/{id}','PostController@show')->name('post.show');
Route::post('post/update/{id}','PostController@update')->name('post.update');
Route::delete('post/delete/{id}','PostController@destroy')->name('post.delete');

//category


Route::post('category','CategoryController@store')->name('category.store');
Route::get('category/create','CategoryController@create')->name('category.create');
Route::get('category/index','CategoryController@index')->name('category.index');
Route::get('category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::get('category/show/{id}','CategoryController@show')->name('category.show');
Route::post('category/update/{id}','CategoryController@update')->name('category.update');
Route::delete('category/delete/{id}','CategoryController@destroy')->name('category.delete');

});





