
<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\UserController;

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

Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/productPage', [MainController::class, 'productPage'])->name('productPage');
Route::get('/menucheckout', [MainController::class, 'menucheckout'])->name('menucheckout');

Route::get('/adicionar_favorito/{product_id}',[FavoritoController::class,'store'])->name('adicionarfavorito');
Route::get('/user/favoritos/{user}', [FavoritoController::class, 'index'])->name('listarfavoritos');

Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('editprofile');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('updateprofile');

// Admin Routes
Route::get('/adminorders', [AdminController::class, 'listOrders'])->name('adminorders')->middleware('is_admin');
Route::get('/adminclients', [AdminController::class, 'listUsers'])->name('adminclients')->middleware('is_admin');
Route::get('/adminproducts', [AdminController::class, 'listProducts'])->name('adminproducts')->middleware('is_admin');