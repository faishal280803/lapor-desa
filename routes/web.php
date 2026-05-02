<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LaporanController::class, 'index']);
Route::post('/kirim', [LaporanController::class, 'store']);
Route::get('/hapus/{id}', [LaporanController::class, 'destroy']);