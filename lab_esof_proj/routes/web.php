
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
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\PDFController;

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

//home routes
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth','verified');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth','verified');
Route::get('/newsletter', [MainController::class, 'newsletter'])->name('newsletter')->middleware('auth','verified');
Route::get('/about', [MainController::class, 'about'])->name('about')->middleware('auth','verified');
Route::get('/contact', [MainController::class, 'contact'])->name('contact')->middleware('auth','verified');
// Route::get('/productPage', [MainController::class, 'productPage'])->name('productPage');
// Route::get('/editprofile', [MainController::class, 'editprofile'])->name('editprofile');
// Route::get('/adminorders', [AdminController::class, 'listOrders'])->name('adminorders')->middleware('is_admin');

//checkout routes
Route::get('/checkout/create', [CheckoutController::class, 'create'])->name('checkout')->middleware(/*'CheckUserPermissions',*/'auth','verified');
Route::post('/session', [CheckoutController::class, 'session'])->name('session')->middleware(/*'CheckUserPermissions',*/'auth','verified');
Route::post('/success', [CheckoutController::class, 'success'])->name('success')->middleware(/*'CheckUserPermissions',*/'auth','verified');
Route::post('/store',[CheckoutController::class, 'store'])->name('store')->middleware(/*'CheckUserPermissions',*/'auth','verified');
Route::get('/storecheckout', [CheckoutController::class, 'storecheckout'])->name('storecheckout')->middleware(/*'CheckUserPermissions',*/'auth','verified');


//user routes
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('editprofile')->middleware('auth','verified');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('updateprofile')->middleware('auth','verified');
Route::post('/user/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('is_admin','auth','verified');
Route::post('/user/restore/{user}', [UserController::class, 'restore'])->withTrashed()->name('users.restore')->middleware('is_admin','auth','verified');

// Admin Routes
Route::get('/adminorders', [AdminController::class, 'listOrders'])->name('adminorders')->middleware('is_admin','auth','verified');
Route::get('/adminclients', [AdminController::class, 'listUsers'])->name('adminclients')->middleware('is_admin','auth','verified');
Route::get('/adminproducts', [AdminController::class, 'listProducts'])->name('adminproducts')->middleware('is_admin','auth','verified');
Route::get('/adminvouchers', [VoucherController::class, 'index'])->name('adminvouchers')->middleware('is_admin','auth','verified');
Route::get('/admin/editvoucher/{voucher}', [VoucherController::class, 'editvoucher'])->name('editvoucher')->middleware('is_admin','auth','verified');
Route::post('/admin/updatevoucher/{voucher}', [VoucherController::class, 'updatevoucher'])->name('updatevoucher')->middleware('is_admin','auth','verified');
Route::get('/admin/create', [VoucherController::class, 'create'])->name('create')->middleware('is_admin','auth','verified');
Route::post('/admin/store', [VoucherController::class, 'store'])->name('store')->middleware('is_admin','auth','verified');
Route::get('/admin/edituser/{user}', [AdminController::class, 'edituser'])->name('edituser')->middleware('is_admin','auth','verified');
Route::post('/admin/updateuser/{user}', [AdminController::class, 'updateuser'])->name('updateuser')->middleware('is_admin','auth','verified');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('editprofile')->middleware('auth','verified');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('updateprofile')->middleware('auth','verified');
Route::get('/adminimages', [AdminController::class, 'listImages'])->name('adminimages')->middleware('is_admin','auth','verified');

//favorite routes
Route::get('/adicionar_favorito/{product_id}',[FavoritoController::class,'store'])->name('adicionarfavorito')->middleware('auth','verified');
Route::get('/user/favoritos/{user}', [FavoritoController::class, 'index'])->name('listarfavoritos')->middleware('auth','verified');
Route::post('/user/favoritos/delete/{product_id}', [FavoritoController::class, 'destroy'])->name('removerfavorito')->middleware('auth','verified');
// Route::get('/historyprofile', [MainController::class, 'historyprofile'])->name('historyprofile');

//products routes
Route::resource('products', ProductsController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('is_admin','auth','verified');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index')->middleware('auth','verified');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show')->middleware('auth','verified');
Route::post('/products/{product}',[ProductsController::class,'update'])->name('products.update');
Route::post('/products/delete/{product}', [ProductsController::class, 'destroy'])->name('products.destroy')->middleware('is_admin','auth','verified');
Route::post('/products/restore/{product}', [ProductsController::class, 'restore'])->withTrashed()->name('products.restore')->middleware('is_admin','auth','verified');
Route::get('/search', [ProductsController::class, 'search'])->name('products.search')->middleware('auth','verified');


//image routes
Route::get('/image/create',[ImagesController::class,'create'])->name('partials.create')->middleware('is_admin','auth','verified');
Route::post('save',[ImagesController::class,'store'])->name('partials.store');
Route::get('/image/{image}/edit]',[ImagesController::class,'edit'])->name('partials.edit')->middleware('is_admin','auth','verified');
Route::post('/image/{image}',[ImagesController::class,'update'])->name('partials.update')->middleware('CheckUserPermissions')->middleware('is_admin','auth','verified');
Route::post('/image/destroy/{image}',[ImagesController::class,'destroy'])->name('partials.destroy')->middleware('CheckUserPermissions')->middleware('is_admin','auth','verified');

//cart routes
Route::post('cart',[CartController::class,'store'])->name('cart.store')->middleware('auth','verified');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

//categories
Route::get('/categories',[CategoriesController::class,'index'])->name('admincategories')->middleware('is_admin','auth','verified');
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create')->middleware('is_admin','auth','verified');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store')->middleware('is_admin','auth','verified');
Route::get('/categories/edit/{categories}',[CategoriesController::class,'edit'])->name('categories.edit')->middleware('is_admin','auth','verified');
Route::post('/categories/update/{categories}',[CategoriesController::class,'update'])->name('categories.update')->middleware('is_admin','auth','verified');
Route::post('/categories/delete/{categories}',[CategoriesController::class,'destroy'])->name('categories.destroy')->middleware('is_admin','auth','verified');

//brands
Route::get('/brands',[BrandsController::class,'index'])->name('adminbrands')->middleware('is_admin','auth','verified');
Route::get('/brands/create',[BrandsController::class,'create'])->name('brands.create')->middleware('is_admin','auth','verified');
Route::post('/brands/store',[BrandsController::class,'store'])->name('brands.store')->middleware('is_admin','auth','verified');
Route::get('/brands/edit/{brands}',[BrandsController::class,'edit'])->name('brands.edit')->middleware('is_admin','auth','verified');
Route::post('/brands/update/{brands}',[BrandsController::class,'update'])->name('brands.update')->middleware('is_admin','auth','verified');
Route::post('/brands/delete/{brands}',[BrandsController::class,'destroy'])->name('brands.destroy')->middleware('is_admin','auth','verified');

Route::get('generate-pdf',[PDFController::class,'generatePDF'])->name('generate-pdf')->middleware('is_admin','auth','verified');