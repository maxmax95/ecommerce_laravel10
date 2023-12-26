<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsersController;
use App\Models\Products;
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
//Route::resource('users', UsersController::class);
Route::get('/home', [SiteController::class, 'index'])->name('home/index');
Route::redirect('/','/home');
Route::get('/product/{slug}', [SiteController::class, 'details'])->name('site/details');
Route::get('categories/{id}', [ SiteController::class, 'categories'])->name('site/categories');
Route::get('/cart', [CartController::class, 'listCart'])->name('site/cart');
Route::post('/cart', [CartController::class, 'addCart'])->name('site/addCart');
Route::post('/remove', [CartController::class, 'removeItemCart'])->name('site/removeItemCart');
Route::post('/refreshCart',[CartController::class, 'refreshCart'])->name('site/refreshCart');
Route::get('/clearCart', [CartController::class, 'clearCart'])->name('site/clearCart');

Route::view('/login', 'login/form')->name('login/form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login/auth');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard')->middleware('auth')->middleware(['auth','checkemail']);
Route::get('/logout',[LoginController::class, 'logout'])->name('site/logout');
Route::get('/register',[LoginController::class, 'create'])->name('login/create');
Route::get('/admin/produtos', [ProductsController::class, 'index'])->name('admin/produtos');
Route::delete('admin/produto/delete/{id}', [ProductsController::class, 'destroy'])->name('admin/product/delete');
Route::post('admin/produto/store', [ProductsController::class, 'store'])->name('admin/product/store');