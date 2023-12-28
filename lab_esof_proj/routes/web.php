
<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoucherController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
// Route::resource('/user', UserController::class);

//home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/productPage', [MainController::class, 'productPage'])->name('productPage');
Route::get('/editprofile', [MainController::class, 'editprofile'])->name('editprofile');
// Route::get('/adminorders', [AdminController::class, 'listOrders'])->name('adminorders')->middleware('is_admin');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/session', [CheckoutController::class, 'session'])->name('session');
Route::get('/success', [CheckoutController::class, 'success'])->name('success');

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
Route::get('/adminvouchers', [VoucherController::class, 'index'])->name('adminvouchers')->middleware('is_admin');
Route::get('/admin/editvoucher/{voucher}', [VoucherController::class, 'editvoucher'])->name('editvoucher')->middleware('is_admin');
Route::post('/admin/updatevoucher/{voucher}', [VoucherController::class, 'updatevoucher'])->name('updatevoucher')->middleware('is_admin');
Route::get('/admin/create', [VoucherController::class, 'create'])->name('create')->middleware('is_admin');
Route::post('/admin/store', [VoucherController::class, 'store'])->name('store')->middleware('is_admin');
Route::get('/admin/edituser/{user}', [AdminController::class, 'edituser'])->name('edituser')->middleware('is_admin');
Route::post('/admin/updateuser/{user}', [AdminController::class, 'updateuser'])->name('updateuser')->middleware('is_admin');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('editprofile');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('updateprofile');
Route::get('/adminimages', [AdminController::class, 'listImages'])->name('adminimages')->middleware('is_admin');


Route::get('/adicionar_favorito/{product_id}',[FavoritoController::class,'store'])->name('adicionarfavorito');
Route::get('/user/favoritos/{user}', [FavoritoController::class, 'index'])->name('listarfavoritos');
Route::post('/user/favoritos/delete/{product_id}', [FavoritoController::class, 'destroy'])->name('removerfavorito');
Route::get('/historyprofile', [MainController::class, 'historyprofile'])->name('historyprofile');

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

//cart routes
Route::post('cart',[CartController::class,'store'])->name('cart.store');
// Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');