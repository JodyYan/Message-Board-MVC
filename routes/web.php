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
Route::get('/messages', 'BoardController@show');
Route::middleware('auth')->group(function (){
    Route::post('/messages', 'BoardController@store');
    Route::get('/messages/create', 'BoardController@index');
    Route::get('/messages/edit/{message}', 'BoardController@edit');
    Route::patch('/messages/{message}', 'BoardController@update')->where('message', '[0-9]+')->middleware('identify');
    Route::delete('/messages/{message}', 'BoardController@destroy')->middleware('identify');
});
