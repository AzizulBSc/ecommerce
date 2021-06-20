<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login-register',[App\Http\Controllers\UsersController::class,'userLoginRegister']);
 Route::get('/login', function () {return view('layouts.login');});
//Route::get('/', function () { return view('welcome');});
//Route::get('/login',[AdminController::class,'login']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//--Frontend Route
Route::get('/products/{id}',[App\Http\Controllers\ProductController::class,'products']);
Route::get('/',[App\Http\Controllers\IndexController::class,'index']);
Route::get('/categories/{category_id}',[App\Http\Controllers\IndexController::class,'categories']);
Route::post('/cart/apply-coupon',[App\Http\Controllers\ProductController::class,'applyCoupon']);
Route::get('/get-product-price',[App\Http\Controllers\ProductController::class,'getprice']);


//--Cart Route
Route::match(['get','post'],'/add-cart',[App\Http\Controllers\ProductController::class,'addtoCart']);
Route::match(['get','post'],'/cart',[App\Http\Controllers\ProductController::class,'cart']);
Route::get('/cart/delete-product/{id}',[App\Http\Controllers\ProductController::class,'deleteCartProduct']);
//--End Cart Route


//--Start category route
Route::get('/admin/add-category',[App\Http\Controllers\CategoryController::class,'addCategory']);
Route::post('/admin/add-category',[App\Http\Controllers\CategoryController::class,'addCategory']);
Route::get('/admin/view-category',[App\Http\Controllers\CategoryController::class,'viewCategory']);
Route::get('/admin/edit-category/{id}',[App\Http\Controllers\CategoryController::class,'editCategory']);
Route::post('/admin/edit-category/{id}',[App\Http\Controllers\CategoryController::class,'editCategory']);
Route::get('/admin/delete-category/{id}',[App\Http\Controllers\CategoryController::class,'deleteCategory']);
//--End products route

//--start products route
Route::get('/admin/add-product',[App\Http\Controllers\ProductController::class,'addProduct']);
Route::post('/admin/add-product',[App\Http\Controllers\ProductController::class,'addProduct']);
Route::get('/admin/view-product',[App\Http\Controllers\ProductController::class,'viewProduct']);
Route::get('/admin/edit-product/{id}',[App\Http\Controllers\ProductController::class,'editProduct']);
Route::post('/admin/edit-product/{id}',[App\Http\Controllers\ProductController::class,'editProduct']);
Route::get('/admin/delete-product/{id}',[App\Http\Controllers\ProductController::class,'deleteProduct']);
Route::match(['get','post'],'/admin/update-product-status',[App\Http\Controllers\ProductController::class,'updateStatus']);
Route::match(['get','post'],'/admin/update-featured-product-status',[App\Http\Controllers\ProductController::class,'updateFeatured']);
//--End products route

//--Start Product Attributes Route
Route::get('/admin/add_attributes/{id}', [App\Http\Controllers\ProductController::class,'add_attributes']);
Route::post('/admin/add_attributes/{id}', [App\Http\Controllers\ProductController::class,'add_attributes']);
Route::get('/admin/delete_attribute/{id}', [App\Http\Controllers\ProductController::class,'delete_attribute']);
Route::match(['get','post'],'/admin/edit_attributes/{id}', [App\Http\Controllers\ProductController::class,'editAttributes']);
Route::match(['get','post'],'/admin/add_images/{id}',[App\Http\Controllers\ProductController::class,'addImages']);
Route::match(['get','post'],'/admin/delete_image/{id}',[App\Http\Controllers\ProductController::class,'deleteImage']);
//--End Product Attributes Route

//--Start Banners Route
Route::match(['get','post'],'/admin/banners',[App\Http\Controllers\BannersController::class,'banners']);
Route::match(['get','post'],'/admin/add-banner',[App\Http\Controllers\BannersController::class,'addBanner']);
Route::match(['get','post'],'/admin/edit-banner/{id}',[App\Http\Controllers\BannersController::class,'editBanner']);
Route::match(['get','post'],'/admin/delete-banner/{id}',[App\Http\Controllers\BannersController::class,'deleteBanner']);
Route::post('/admin/update-banner-status',[App\Http\Controllers\BannersController::class,'updateStatus']);
//--End Banners Route

//--Start Coupon Route
Route::match(['get','post'],'/admin/add-coupon',[App\Http\Controllers\CouponsController::class,'addCoupon']);
Route::match(['get','post'],'/admin/view-coupons',[App\Http\Controllers\CouponsController::class,'viewCoupons']);
Route::post('/admin/update-coupon-status',[App\Http\Controllers\CouponsController::class,'updateStatus']);
Route::match(['get','post'],'/admin/edit-coupon/{id}',[App\Http\Controllers\CouponsController::class,'editCoupon']);
Route::match(['get','post'],'/admin/delete-coupon/{id}',[App\Http\Controllers\CouponsController::class,'deleteCoupon']);
//--End Coupon Route