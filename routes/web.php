<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\FeaturedCategoryController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Middleware\CheckPermission;
use \App\Http\Controllers\Client\ProductController as ClientProductController;

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


Route::prefix('')->name('client.')->group(function(){
    
    Route::get('/', [\App\Http\Controllers\Client\HomeController::class , 'index'])->name('index');
    Route::get('/product/{product}',[ClientProductController::class , 'show'])->name('product.show');

    Route::post('/product/{product}/comment/store',[CommentController::class , 'store'])->name('product.comment.store');



    Route::get('/register',[RegisterController::class,'create'])->name('register');
    Route::post('/register/sendmail',[RegisterController::class,'sendMail'])->name('register.sendmail');
    Route::get('/register/otp/{user}',[RegisterController::class,'otp'])->name('register.otp');
    Route::post('/register/verifyOtp/{user}',[RegisterController::class,'verifyOtp'])->name('register.verifyOtp');
    Route::delete('/logout',[RegisterController::class,'logout'])->name('logout');

    Route::post('/like/{product}',[LikeController::class,'store'])->name('like');
    Route::get('/likes/',[LikeController::class,'index'])->name('likes.index');
    Route::delete('/like/{product}',[LikeController::class,'destroy'])->name('like.destroy');

    Route::post('/cart/{product}', [CartController::class,'store']);
    Route::delete('/cart/{product}', [CartController::class,'destroy']);
    Route::get('/cart', [CartController::class,'index'])->name('cart.index');


    Route::get('/order/', [OrderController::class,'create'])->name('order.create');
    Route::get('/order/{order}', [OrderController::class,'show'])->name('order.show');
    Route::get('/order/payment/callback', [OrderController::class,'callback'])->name('order.callback');
    Route::post('/order/', [OrderController::class,'store'])->name('order.store');

    Route::post('/order/offer', [OrderController::class,'off'])->name('order.offer');
});

// middleware([
//     CheckPermission::class . ':view-dashbord',
//     'auth'
// ])

Route::prefix('/adminpanel')->group(function(){

Route::get('/', function(){
    return view('admin.home');
});

Route::resource('category', CategoryController::class);
Route::resource('brand', BrandController::class);
Route::resource('product', ProductController::class);
Route::resource('product.pictures', PictureController::class);
Route::resource('product.discount', DiscountController::class);
Route::resource('propertyGroup', PropertyGroupController::class);
Route::resource('property', PropertyController::class);
Route::resource('slide', SlideController::class);

Route::get('/product/{product}/property',[\App\Http\Controllers\Admin\ProductPropertyController::class,'index'])->name('product.property.index');
Route::get('/product/{product}/property/create',[\App\Http\Controllers\Admin\ProductPropertyController::class,'create'])->name('product.property.create');
Route::post('/product/{product}/property',[\App\Http\Controllers\Admin\ProductPropertyController::class,'store'])->name('product.property.store');

Route::get('/product/{product}/comment',[AdminCommentController::class,'index'])->name('product.comment.index');
Route::delete('/comment/{comment}',[AdminCommentController::class,'destroy'])->name('comment.destroy');

Route::get('/featuredCategory', [FeaturedCategoryController::class,'create']);
Route::post('/featuredCategory', [FeaturedCategoryController::class,'store'])->name('featuredCategory.store');

Route::resource('offer', OfferController::class);


Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
});


