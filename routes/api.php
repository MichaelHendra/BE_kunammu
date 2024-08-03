<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/show/{id}', [BarangController::class, 'show']);
Route::post('/barang/add', [BarangController::class, 'store']);
Route::put('/barang/update/{id}', [BarangController::class, 'update']);
Route::delete('/barang/delete/{id}', [BarangController::class, 'delete']);

Route::get('/cart/{id}', [CartController::class, 'show']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCart']);
