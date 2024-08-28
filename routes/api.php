<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalonNasabahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabKotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KantorCabangController;

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Calon Nasabah Routes
Route::prefix('calon-nasabah')->group(function () {
    Route::get('/', [CalonNasabahController::class, 'indexByCabang']);
    Route::get('/all', [CalonNasabahController::class, 'index']);
    Route::post('/', [CalonNasabahController::class, 'store']);
    Route::put('/{id}', [CalonNasabahController::class, 'update']);
    Route::delete('/{id}', [CalonNasabahController::class, 'destroy']);
    Route::post('/{id}/approve', [CalonNasabahController::class, 'approve']);
});

// Pekerjaan Routes
Route::prefix('pekerjaan')->group(function () {
    Route::get('/', [PekerjaanController::class, 'index']);
    Route::get('/{id}', [PekerjaanController::class, 'show']);
});

// Provinsi Routes
Route::prefix('provinsi')->group(function () {
    Route::get('/', [ProvinsiController::class, 'index']);
    Route::get('/{id}', [ProvinsiController::class, 'show']);
});

// Kabupaten/Kota Routes
Route::prefix('kab-kota')->group(function () {
    Route::get('/', [KabKotaController::class, 'index']);
    Route::get('/{kabKota}', [KabKotaController::class, 'show']);
    Route::get('/provinsi/{provinsiId}', [KabKotaController::class, 'getByProvinsiId']);
});

// Kecamatan Routes
Route::prefix('kecamatan')->group(function () {
    Route::get('/', [KecamatanController::class, 'index']);
    Route::get('/{id}', [KecamatanController::class, 'show']);
    Route::get('/kab-kota/{kabKotaId}', [KecamatanController::class, 'getByKabKotaId']);
});

// Kelurahan Routes
Route::prefix('kelurahan')->group(function () {
    Route::get('/', [KelurahanController::class, 'index']);
    Route::get('/{id}', [KelurahanController::class, 'show']);
    Route::get('/kecamatan/{kecamatanId}', [KelurahanController::class, 'getByKecamatanId']);
});

// Kantor Cabang Routes
Route::get('kantor-cabang', [KantorCabangController::class, 'index']);
Route::get('kantor-cabang/{id}', [KantorCabangController::class, 'show']);