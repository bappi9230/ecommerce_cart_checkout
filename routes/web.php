<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
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


/////////frontend///////////

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', "Index")->name('home');
});

Route::get('/product/view/modal/{id}',[FrontendController::class,'ProductModal']);

Route::post('/cart/data/store/{id}',[FrontendController::class, 'AddToCart']);

Route::get('/product/mini/cart/', [FrontendController::class, 'AddMiniCart']);

Route::get('/minicart/product-remove/{rowId}', [FrontendController::class, 'RemoveMiniCart']);

Route::get('/check-out', [FrontendController::class, 'Checkout'])->name('checkout');

Route::post('/checkout/store', [FrontendController::class, 'CheckoutStore'])->name('checkout.store');






/////////////backend/////////////////

Route::controller(BackendController::class)->group(function () {
    Route::get('/admin', "Index")->name('admin');

    Route::get('/change/status/{id}', "ChangeStatus")->name('change_status');

});

Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product','Index')->name('all_product');
    Route::get('/add/product','AddProduct')->name('add_product');
    Route::post('/store/product','StoreProduct')->name('store_product');

});
