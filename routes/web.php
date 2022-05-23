<?php

use App\Http\Controllers\Bupot\BupotPph21FinalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::prefix('bupot')->group(function () {
        Route::resource('/bupot-pph21-final', BupotPph21FinalController::class);
    });
});

Route::get('/migrate', function () {
    return Artisan::call('migrate:fresh');
});

Route::get('/seed', function () {
    return Artisan::call('db:seed');
});

require __DIR__ . '/auth.php';
