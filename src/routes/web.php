<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SellController;

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


Route::middleware('auth')->group(function () {
    Route::get('/', [TopController::class, 'index'])->name('top');
    Route::get('/item/{item_id}', [ItemController::class, 'index']);
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->name('confirm');
    Route::post('/purchase', [PurchaseController::class, 'purchase']);
    Route::get('/purchase/payment/{item_id}', [PurchaseController::class, 'payment'])->name('payment');
    Route::get('/purchase/address/{item_id}', [AddressController::class, 'index'])->name('address');
    Route::post('/purchase/address/{item_id}', [AddressController::class, 'update'])->name('update_address');
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    Route::get('/mypage/profile', [ProfileController::class, 'index']);
    Route::post('/mypage/profile', [ProfileController::class, 'update']);
    Route::get('/sell', [SellController::class, 'index']);
    Route::post('/sell', [SellController::class, 'sell']);
});
// Route::get('/', [TopController::class, 'index'])->name('logout_top');
