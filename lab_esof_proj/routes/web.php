
<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CartController;
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
//cart routes
Route::post('cart',[CartController::class,'store'])->name('cart.store');
// Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
//products routes
Route::resource('products', ProductsController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('is_admin');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::post('/products/{product}',[ProductsController::class,'update'])->name('updateProduct');
//image routes
Route::get('/image/create',[ImagesController::class,'create'])->name('partials.create');
Route::post('save',[ImagesController::class,'store'])->name('partials.store');
Route::get('/image/{image}/edit]',[ImagesController::class,'edit'])->name('partials.edit')->middleware('CheckUserPermissions')->middleware('is_admin');
Route::post('/image/{image}',[ImagesController::class,'update'])->name('partials.update');
//home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
//other routes
Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
// Route::get('/productPage', [MainController::class, 'productPage'])->name('productPage');
Route::get('/menucheckout', [MainController::class, 'menucheckout'])->name('menucheckout');
//favorite routes
Route::get('/adicionar_favorito/{product_id}',[FavoritoController::class,'store'])->name('adicionarfavorito')->middleware('CheckUserPermissions');
Route::get('/user/favoritos/{user}', [FavoritoController::class, 'index'])->name('listarfavoritos')->middleware('CheckUserPermissions');
//user routes
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('editprofile')->middleware('CheckUserPermissions');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('updateprofile');
// Admin Routes
Route::get('/adminorders', [AdminController::class, 'listOrders'])->name('adminorders')->middleware('is_admin');
Route::get('/adminclients', [AdminController::class, 'listUsers'])->name('adminclients')->middleware('is_admin');
Route::get('/adminproducts', [AdminController::class, 'listProducts'])->name('adminproducts')->middleware('is_admin');
Route::get('/adminimages', [AdminController::class, 'listImages'])->name('adminimages')->middleware('is_admin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
