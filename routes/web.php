<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'posts/user/about')->name('about');

Route::resource('category', CategoryController::class);
Route::resource('posts', ItemController::class);
Route::get('/search', [ItemController::class, 'search']);


Route::post('posts/{id}/comment/store', [CommentController::class, 'storeComments']);
Route::get('posts/getComments/{item}', [CommentController::class, 'getComments']);



Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::put('/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.destroy');
