<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::resource('/user', UserController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/login', [MainController::class, 'login'])->name('login');
// Route::get('/register', [UserController::class, 'register'])->name('register');

Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
// Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/productPage', [MainController::class, 'productPage'])->name('productPage');
// Route::get('/footer', [MainController::class, 'footer'])->name('footer');
Route::get('/menucheckout', [MainController::class, 'menucheckout'])->name('menucheckout');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('editprofile');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('updateprofile');
Route::get('/fav/favprofile', [FavoritoController::class, 'index'])->name('favprofile');
Route::get('/historyprofile', [MainController::class, 'historyprofile'])->name('historyprofile');
Route::get('/adminorders', [MainController::class, 'adminorders'])->name('adminorders')->middleware('is_admin');
Route::get('/adminclients', [MainController::class, 'adminclients'])->name('adminclients')->middleware('is_admin');
Route::get('/adminproducts', [MainController::class, 'adminproducts'])->name('adminproducts')->middleware('is_admin');
