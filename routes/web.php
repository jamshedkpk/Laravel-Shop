<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontEndController::class,'index'])->name('homepage');
// Get product of specific catagory by using catagory id
Route::get('/catagory/products/{id}',[FrontEndController::class,'searchCatagoryProduct'])->name('catagory-product');
// Get product detail by using product id
Route::get('/product-detail/{productSlug}/{id}',[FrontEndController::class,'productDetail'])->name('product-detail');
// Get all products in the cart of a specific user
Route::get('/cart',[CartController::class,'index'])->name('cart-index');
// Store new product in the cart
Route::post('/cart/store',[CartController::class,'addProductToCart'])->name('cart-store');
// Delete a product from the cart
Route::delete('/cart/delete/{id}',[CartController::class,'destroy'])->name('cart-delete');
// Get all products in the cart of a specific user by ajax call
Route::get('/cart/products',[CartController::class,'searchCartRecord'])->name('cart-product');
// Count products in the cart of a specific user by ajax call
Route::get('/cart/count',[CartController::class,'countCartProduct'])->name('cart-count');
// Update cart products in the cart of a specific user by ajax call
Route::put('/cart/update/{id}',[CartController::class,'update'])->name('cart-update');
// Count cart total price 
Route::get('/cart/price',[CartController::class,'cartTotalPrice'])->name('cart-total-price');
// Call to checkout controller
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout-index');
// Place user order 
Route::get('/place/order',[CheckoutController::class,'placeOrder'])->name('place-order');

// Route for user to get and update their profile
Route::get('/user/profile/{id}',[UserController::class,'viewProfile'])->name('view-user-profile');
Route::get('/user/edit/profile/{id}',[UserController::class,'editProfile'])->name('edit-user-profile');
Route::get('/user/edit/password/{id}',[UserController::class,'editPassword'])->name('edit-user-password');
Route::get('/user/edit/photo/{id}',[UserController::class,'editPhoto'])->name('edit-user-photo');
Route::put('/user/update/profile/{id}',[userController::class,'updateProfile'])->name('update-user-profile');



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

// Routes for order by admin
Route::get('/order/pending',[OrderController::class,'orderPending'])->name('order-pending');
Route::get('/order/shipped',[OrderController::class,'orderShipped'])->name('order-shipped');
Route::get('/order/delivered',[OrderController::class,'orderDelivered'])->name('order-delivered');
Route::get('/order/{id}',[OrderController::class,'orderDetail'])->name('order-detail');
Route::put('/order/status/{id}',[OrderController::class,'updateOrder'])->name('update-order-status');

// Routes for user by admin side
Route::get('/user',[UserController::class,'index'])->name('user-index');

});