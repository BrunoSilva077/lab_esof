<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/products', [MainController::class, 'products'])->name('products');