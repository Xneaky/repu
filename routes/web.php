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

Route::get('/', function () {return view('dashboard.index');})->middleware('auth');
Route::get('/main', function () {return view('guest.index');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('eventos', 'EventosController')->middleware('auth');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{blog}', 'BlogController@show');
