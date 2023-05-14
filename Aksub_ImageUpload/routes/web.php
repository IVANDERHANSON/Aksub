<?php

use App\Http\Controllers\DataController;
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

Route::post('/upload', [DataController::class, 'upload'])->name('upload');
Route::get('/', [DataController::class, 'show'])->name('show');
Route::delete('/delete-data/{id}', [DataController::class, 'delete'])->name('delete');