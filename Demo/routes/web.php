<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/2', function () {
    return view('welcome');
});

Route::get('/test/{id}-{name}', 'TestController@test')->name('test')->where('id','[0-9]+')->where('name','[\w]+');

Route::group(['prefix' => 'user', 'middleware' => 'ip'], function () {

  Route::any('/add/{id}', 'TestController@add')->name('add')->where('id','[0-9]+');
});

Route::get('/testvoir', 'TestController@affiche')->name('affiche');
Route::get('/etat/{id}', 'TestController@etat')->name('etat');
Route::get('/like/{id}', 'TestController@like')->name('like');
