<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\CartController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontEndController::class,'index'])->name('homepage');
Route::get('/catagory/products/{id}',[FrontEndController::class,'searchCatagoryProduct'])->name('catagory-product');
Route::get('/product-detail/{productSlug}/{id}',[FrontEndController::class,'productDetail'])->name('product-detail');
Route::get('/cart',[CartController::class,'index'])->name('cart-index');
Route::post('/cart/store',[CartController::class,'addProductToCart'])->name('cart-store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for admin
Route::middleware(['auth','isAdmin'])->group(function(){
Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

// Routes for catagory
Route::get('/catagory',[CatagoryController::class,'index'])->name('catagory-index');
Route::get('/catagory/create',[CatagoryController::class,'create'])->name('catagory-create');
Route::post('/catagory/store',[CatagoryController::class,'store'])->name('catagory-store');
Route::get('/catagory/delete/{id}',[CatagoryController::class,'destroy'])->name('catagory-delete');
Route::get('/catagory/edit/{id}',[CatagoryController::class,'edit'])->name('catagory-edit');
Route::put('/catagory/update/{id}',[CatagoryController::class,'update'])->name('catagory-update');

// Routes for product
Route::get('/product',[ProductController::class,'index'])->name('product-index');
Route::get('/product/create',[ProductController::class,'create'])->name('product-create');
Route::post('/product/store',[ProductController::class,'store'])->name('product-store');
Route::get('/product/delete/{id}',[ProductController::class,'destroy'])->name('product-delete');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product-edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product-update');
});