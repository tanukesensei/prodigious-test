<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin_registration', 'UsersController@create')->name('admin_registration');
Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users/store', 'UsersController@store')->name('user_store');
Route::get('/users/show/{id}', 'UsersController@show')->name('users.show');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::put('/users/update/{id}', 'UsersController@update')->name('users.update');
Route::delete('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');
