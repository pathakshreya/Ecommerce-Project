<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;


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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/dashboard', 'Admin\FrontendController@index');

//Category
Route::get('categories', 'Admin\CategoryController@index');
Route::get('add-category', 'Admin\CategoryController@addcategory');
Route::post('insert-category', 'Admin\CategoryController@insertcategory');
Route::get('edit/{id}', 'Admin\CategoryController@editcategory');
Route::delete('delete-category/{id}', 'Admin\CategoryController@deletecategory');
Route::put('update-category/{id}', 'Admin\CategoryController@updatecategory');   
});

//Product
Route::get('product', 'ProductController@index');
Route::get('add-product', 'ProductController@create');
Route::post('store','ProductController@store');
Route::get('edit-product/{id}','ProductController@edit');
Route::put('update/{id}', 'ProductController@update');
Route::get('destroy/{id}','ProductController@destroy');

//Cart
Route::get('cart', [CartController::class, 'cart']);
//Route::post('cart/{id}', [CartController::class, 'cart']);
Route::post('addcart/{id}', [CartController::class, 'addcart']);



//Frontend Category



