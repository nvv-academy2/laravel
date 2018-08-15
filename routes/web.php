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

Route::get("test", function () {
    die("hello world");
});

Route::get("users", function () {
    die("hello world");
});


Route::get('users', 'UsersController@index');

Route::resource('test', "TestController");//->only(['store', 'index']);

/*
Route::post('test', 'TestController@store');
Route::get('test', 'TestController@index');
Route::get('test/{id}', 'TestController@show');
Route::put('test/{id}', 'TestController@update');
Route::delete('test/{id}', 'TestController@destroy');
*/
/*
Route::group([
    'prefix' => 'users'
], function() {
    Route::get("/", function () {
        die("hello main");
    });

    Route::get("list", function () {
        die("hello list");
    });

    Route::get("test", function () {
        die("hello test");
    });
});
*/

