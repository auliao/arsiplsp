<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SuratController::class, 'index'])->name('surats.index');
Route::get('/surats', [SuratController::class, 'index'])->name('surats.index');
Route::get('/surats/create', [SuratController::class, 'create'])->name('surats.create');
Route::post('/surats', [SuratController::class, 'store'])->name('surats.store');
Route::get('/surats/{id}/edit', [SuratController::class, 'edit'])->name('surats.edit');
Route::put('/surats/{id}', [SuratController::class, 'update'])->name('surats.update');
Route::get('/surats/{surat}', [SuratController::class, 'show'])->name('surats.show');
Route::delete('/surats/{surat}', [SuratController::class, 'destroy'])->name('surats.destroy');
Route::get('/surats/{surat}/download', [SuratController::class, 'download'])->name('surats.download');
Route::get('/about', [SuratController::class, 'about'])->name('about');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, "create"])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, "store"])->name('kategori.store');
Route::get('/kategori/{k}/edit', [KategoriController::class, "edit"])->name('kategori.edit');
Route::put('/kategori/{k}', [KategoriController::class, "update"])->name('kategori.update');
Route::delete('/kategori/{k}', [KategoriController::class, "destroy"])->name('kategori.destroy');

