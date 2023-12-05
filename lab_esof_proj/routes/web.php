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
Route::get('/menucheckout', [MainController::class, 'menucheckout'])->name('menucheckout');
Route::get('/adminorders', [MainController::class, 'adminorders'])->name('adminorders');
Route::get('/adminclients', [MainController::class, 'adminclients'])->name('adminclients');
Route::get('/adminproducts', [MainController::class, 'adminproducts'])->name('adminproducts');
Route::get('/editprofile', [MainController::class, 'editprofile'])->name('editprofile');

