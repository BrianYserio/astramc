<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Administrative\TransmittalController;
use App\Http\Controllers\Web\Administrative\AdjustmentRequestController;
use App\Http\Controllers\Web\Administrative\ItRequestController;
use App\Http\Controllers\Web\Administrative\MarketingRequestController;
use App\Http\Controllers\Web\Administrative\ProductRequestController;
use App\Http\Controllers\Web\Administrative\CorrectiveRequestController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(TransmittalController::class)
        ->prefix('Administrative')
        ->name('transmittal.')
        ->middleware('auth', 'verified')
        ->group(function() {
Route::get('/transmittal', 'index')->name('index');
Route::get('/', 'create')->name('create');
});

Route::controller(AdjustmentRequestController::class)
        ->prefix('Administrative')
        ->name('adjustment-request.')
        ->middleware('auth', 'verified')
        ->group(function() {
Route::get('/adjustment-request', 'index')->name('index');
});

Route::controller(ItRequestController::class)
        ->prefix('Administrative')
        ->name('it-service-request.')
        ->middleware('auth', 'verified')
        ->group(function() {
Route::get('/it-service-request', 'index')->name('index');
});

Route::controller(MarketingRequestController::class)
        ->prefix('Administrative')
        ->name('marketing-service-request.')
        ->middleware('auth', 'verified')
        ->group(function() {
Route::get('/marketing-service-request', 'index')->name('index');
});

Route::controller(ProductRequestController::class)
        ->prefix('Administrative')
        ->name('product-service-request.')
        ->middleware('auth', 'verified')
        ->group(function() {
Route::get('/product-service-request', 'index')->name('index');
});

Route::controller(CorrectiveRequestController::class)
        ->prefix('Administrative')
        ->name('corrective-action-request.')
        ->middleware('auth', 'verified')
        ->group(function() {
Route::get('/corrective-action-request', 'index')->name('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
