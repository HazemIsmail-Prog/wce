<?php

use App\Http\Controllers\EstimationController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/migrate-fresh-seed',function(){
    Artisan::call('migrate:fresh --seed');
});
Route::get('/migrate',function(){
    Artisan::call('migrate');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/games', [GameController::class, 'index'])->name('games');
    Route::post('/save_game_score/{game}', [GameController::class, 'save'])->name('save_game_score');
    Route::post('/save_estimation/{game}', [EstimationController::class, 'store'])->name('save_estimation');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
