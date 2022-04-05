<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostSellerController;

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


Route::resource('/posts', PostController::class, ['only' => ['index', 'show', 'create', 'edit', 'store', 'update', 'destroy', 'search']]);
Route::post('/posts/search', [PostController::class, 'search'])->name('posts.search');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/nice/{post}', [NiceController::class, 'nice'])->name('nice');
Route::get('/posts/unnice/{post}', [NiceController::class, 'unnice'])->name('unnice');
Route::get('users/mypage/nice', [UserController::class, 'nice'])->name('mypage.nice');

Route::get('users/mypage', [UserController::class, 'mypage'])->name('mypage');
Route::get('users/mypage/edit', [UserController::class, 'edit'])->name('mypage.edit');
Route::get('users/mypage/address/edit', [UserController::class, 'edit_address'])->name('mypage.edit_address');
Route::put('users/mypage', [UserController::class, 'update'])->name('mypage.update');
Route::get('users/mypage/order', [UserController::class, 'order_history'])->name('mypage.order_history');

Route::get('users/mypage/password/edit', [UserController::class, 'edit_password'])->name('mypage.edit_password');
Route::put('users/mypage/password', [UserController::class, 'update_password'])->name('mypage.update_password');

Route::post('/order/index', [OrderController::class, 'index'])->name('order.index');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/seller', [PostSellerController::class, 'index'])->name('seller.index');
Route::get('/seller/show', [PostSellerController::class, 'show'])->name('seller.show');
