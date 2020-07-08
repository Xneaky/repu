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

Route::get('/dashboard', function () {return view('dashboard.index');})->middleware('auth');
Route::get('/main', function () {return view('guest.index');});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('eventos', 'EventosController')->middleware('auth');
Route::get('/', 'BlogController@index');
Route::get('/blog/{data}', 'BlogController@show');
Route::get('/blog', 'BlogController@blog');
Route::resource('usuarios', 'UsersController');
