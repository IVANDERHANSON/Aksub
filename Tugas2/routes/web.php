<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function() {
    return view('welcome');
})->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [BukuController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('buku')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/download/{id}', [BukuController::class, 'download'])->name('download');
});

Route::middleware('admin')->group(function(){
    Route::get('/add', [BukuController::class, 'index'])->name('home');
    Route::post('/add', [BukuController::class, 'create'])->name('create');
    Route::get('/list', [BukuController::class, 'show'])->name('list');
    Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [BukuController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BukuController::class, 'delete'])->name('delete');
    Route::get('/admin-dashboard', [BukuController::class, 'admin'])->name('admin');
});

require __DIR__.'/auth.php';
