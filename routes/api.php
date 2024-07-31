<?php

use App\Http\Controllers\BarangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/show/{id}', [BarangController::class, 'show']);
Route::post('/barang/add', [BarangController::class, 'store']);
Route::put('/barang/update/{id}', [BarangController::class, 'update']);
Route::delete('/barang/delete/{id}', [BarangController::class, 'delete']);

