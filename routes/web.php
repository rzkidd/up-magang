<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [AuthController::class, 'register_index']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login_index']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/create', [BarangController::class, 'create']);
Route::post('/barang/create', [BarangController::class, 'store']);
Route::get('/barang/{id}/update', [BarangController::class, 'edit']);
Route::post('/barang/{id}/update', [BarangController::class, 'update']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
