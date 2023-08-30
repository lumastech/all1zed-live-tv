<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RadioController;
use App\Http\Controllers\TvController;

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
Route::get('/', [TvController::class, 'home'])->name('home');
Route::get('/tvs', [TvController::class, 'index'])->name('tvs');
Route::get('/dashboard', [TvController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/watch/{id}', [TvController::class, 'watch'])->name('watch');

// admin group routes
Route::middleware('auth')->prefix('admin')->group(function (){
    // tv
    Route::get('/', [TvController::class, 'dashboard'])->name('dashboard');
    Route::get('/tvs', [TvController::class, 'tvs'])->name('tvs');
    Route::post('storetv', [TvController::class, 'store']);
    Route::post('/updatetv', [TvController::class, 'update']);
    Route::post('/updatetvimage', [TvController::class, 'updateimage']);
    Route::get('/edittv/{id}', [TvController::class, 'edit'])->name('edittv');
    Route::get('deletetv/{id}', [TvController::class, 'delete']);
});

require __DIR__.'/auth.php';
