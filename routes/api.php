<?php

use App\Http\Controllers\Api\BarangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('barangs', BarangController::class);
Route::get('barangs/{id}/transaksi', [BarangController::class, 'transaksi'])->name('api.barang.transaksi');
Route::get('/chart-data', [BarangController::class, 'getChartData']);
