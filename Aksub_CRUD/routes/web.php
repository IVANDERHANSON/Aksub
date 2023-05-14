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

Route::get('/create-new-data', function () {
    return view('createNewData');
});

Route::post('/create', [DataController::class, 'create'])->name('create');

Route::get('/', [DataController::class, 'show'])->name('show');

Route::get('/edit-data/{id}', [DataController::class, 'edit'])->name('edit');

Route::patch('/update-data/{id}', [DataController::class, 'update']);

Route::delete('/delete-data/{id}', [DataController::class, 'delete']);