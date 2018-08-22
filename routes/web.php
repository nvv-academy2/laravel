<?php
//laravel Model relations
use \App\Product;
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

Route::pattern('category', '[0-9]+');
Route::get("/categories/filter", "CategoriesController@filterCategoriesIds");
Route::resource('/categories', "CategoriesController");


//Route::get('/category/{id}');
Auth::routes();

Route::get('/seed', function () {

    $products = [];

    $categories = \App\Category::all()->pluck('id')->toArray();

    for($i = 0; $i < 10; $i++) {
        $products[] = [
            'name' => "Product $i",
            'category_id' => array_rand($categories),
        ];
    }

    Product::insert($products);
});

Route::get('/home', 'HomeController@index')->name('home');
