<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/item/mylist',[TopController::class, 'mylist']);
Route::post('/item/recommendation',[TopController::class, 'recommendation']);
Route::get('/item/{item_id}',[ItemController::class, 'index']);
Route::post('/item/{item_id}/like',[LikeController::class, 'like']);
Route::post('/item/{item_id}/unlike',[LikeController::class, 'unlike']);

