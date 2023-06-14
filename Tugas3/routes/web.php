<?php

use App\Http\Controllers\BukuController;
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

Route::get('/', [BukuController::class, 'show'])->name('list');

Route::prefix('buku')->group(function () {
    Route::get('/add', [BukuController::class, 'index'])->name('home');
    Route::post('/add', [BukuController::class, 'create'])->name('create');
    Route::get('/list', [BukuController::class, 'show'])->name('list');
    Route::get('/download/{id}', [BukuController::class, 'download'])->name('download');
    Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [BukuController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BukuController::class, 'delete'])->name('delete');
});