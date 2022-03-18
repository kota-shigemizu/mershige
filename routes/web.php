<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\UserController;

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


Route::resource('/posts', PostController::class, ['only' => ['index', 'show', 'create', 'edit', 'store', 'update', 'destroy' ]]);

Auth::routes();

Route::get('users/carts', [CartController::class, 'index'])->name('carts.index');
Route::post('users/carts', [CartController::class, 'store'])->name('carts.store');
Route::delete('users/carts', [CartController::class, 'destroy'])->name('carts.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/nice/{post}', [NiceController::class, 'nice'])->name('nice');
Route::get('/posts/unnice/{post}', [NiceController::class, 'unnice'])->name('unnice');
Route::get('users/mypage/nice', [UserController::class, 'nice'])->name('mypage.nice');

Route::get('users/mypage', [UserController::class, 'mypage'])->name('mypage');
Route::get('users/mypage/edit', [UserController::class, 'edit'])->name('mypage.edit');
Route::get('users/mypage/address/edit', [UserController::class, 'edit_address'])->name('mypage.edit_address');
Route::put('users/mypage', [UserController::class, 'update'])->name('mypage.update');

Route::get('users/mypage/password/edit', [UserController::class, 'edit_password'])->name('mypage.edit_password');
Route::put('users/mypage/password', [UserController::class, 'update_password'])->name('mypage.update_password');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:admins');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
  Route::get('login', [Dashboard\Auth\LoginController::class ,'showLoginForm'])->name('login');
  Route::post('login', [Dashboard\Auth\LoginController::class, 'login'])->name('login');
});
