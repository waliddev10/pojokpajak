<?php

use App\Http\Controllers\Bupot\BupotPph21FinalController;
use App\Http\Controllers\Bupot\BupotPPhUnifikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('home.index');
Route::get('/tutorial', [TutorialController::class, 'index'])->name('tutorial.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');

    Route::prefix('bupot')->group(function () {
        Route::resource('/bupot-pph21-final', BupotPph21FinalController::class);
        Route::get('/download/bupot-pph21-final/{bupot_pph21}', [BupotPph21FinalController::class, 'download'])->name('bupot-pph21-final.download');
        Route::resource('/bupot-pph-unifikasi', BupotPPhUnifikasiController::class);
    });
});

Route::get('/migrate', function () {
    return Artisan::call('migrate:fresh');
});

Route::get('/seed', function () {
    return Artisan::call('db:seed');
});

require __DIR__ . '/auth.php';
