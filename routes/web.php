<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;


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

Route::get('/search', [FrontendController::class, 'search']);
Route::get('/searchproduct/{slug}', [FrontendController::class, 'searchproduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', [App])
// Route::middleware(['auth', 'isAdmin'])->group(function(){
//     Route::get('/', 'HomeController@index');
// });
//User 
// Route::middleware(['auth'])->group(function(){
    
// });
Route::get('/logout', [HomeController::class, 'logout']);


//Cart
Route::get('cart', [CartController::class, 'cart']);
//Route::post('cart/{id}', [CartController::class, 'cart']);
Route::post('addcart/{id}', [CartController::class, 'addcart']);
Route::get('deletecart/{id}', [CartController::class, 'deleteCart']);
Route::get('load-cart-data',[CartController::class, 'cartcount']);

//Checkout
Route::get('checkout', [CheckoutController::class, 'index']);
Route::post('place-order', [CheckoutController::class, 'placeorder'])->name('place_order.store');

//Wishist
Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');;
Route::post('addwishlist/{id}', [WishlistController::class, 'addwishlist']);
Route::get('deletewishlist/{id}', [WishlistController::class, 'deletewishlist']);

Route::get('load-wishlist-data', [WishlistController::class, 'wishlistcount']);

//Route::get('add-to-wishlist', [WishlistController::class, 'add']);

Route::get('view-order', [CheckoutController::class, 'vieworder']);

//Rating
Route::post('add-rating', [RatingController::class, 'addrating']);






//----------------Admin
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


//View order
Route::get('order', 'OrderController@index');
Route::get('delete/{id}', 'OrderController@delete');











