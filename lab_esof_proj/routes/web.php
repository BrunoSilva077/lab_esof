<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

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

Auth::routes(['verify' => true]);

Route::resource('products', ProductsController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
// Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/productPage', [MainController::class, 'productPage'])->name('productPage');
Route::get('/footer', [MainController::class, 'footer'])->name('footer');
Route::get('/menucheckout', [MainController::class, 'menucheckout'])->name('menucheckout');
Route::get('/editprofile', [MainController::class, 'editprofile'])->name('editprofile');
Route::get('/adminorders', [MainController::class, 'adminorders'])->name('adminorders')->middleware('is_admin');
Route::get('/adminclients', [MainController::class, 'adminclients'])->name('adminclients')->middleware('is_admin');
Route::get('/adminproducts', [MainController::class, 'adminproducts'])->name('adminproducts')->middleware('is_admin');



