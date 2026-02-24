<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Administrative\TransmittalController;
use App\Http\Controllers\Web\Administrative\AdjustmentRequestController;
use App\Http\Controllers\Web\Administrative\ItRequestController;
use App\Http\Controllers\Web\Administrative\MarketingRequestController;
use App\Http\Controllers\Web\Administrative\ProductRequestController;
use App\Http\Controllers\Web\Administrative\CorrectiveRequestController;
use App\Http\Controllers\Web\Importation\ShipmentOrderController;
use App\Http\Controllers\Web\Importation\ShipmentRegistryController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('Administrative')
    ->middleware(['auth', 'verified'])
    ->group(function() {

        // Transmittal
        Route::controller(TransmittalController::class)
            ->name('transmittal.')
            ->group(function() {
                Route::get('/transmittal', 'index')->name('index');
                Route::get('/transmittal/create', 'create')->name('create');
            });

        // Adjustment Request
        Route::controller(AdjustmentRequestController::class)
            ->name('adjustment-request.')
            ->group(function() {
                Route::get('/adjustment-request', 'index')->name('index');
                Route::get('/adjustment-request/create', 'create')->name('create');
            });

        // IT Service Request
        Route::controller(ItRequestController::class)
            ->name('it-service-request.')
            ->group(function() {
                Route::get('/it-service-request', 'index')->name('index');
                Route::get('/it-service-request/create', 'create')->name('create');
            });

        // Marketing Request
        Route::controller(MarketingRequestController::class)
            ->name('marketing-service-request.')
            ->group(function() {
                Route::get('/marketing-service-request', 'index')->name('index');
                Route::get('/marketing-service-request/create', 'create')->name('create');
            });

        // Product Request
        Route::controller(ProductRequestController::class)
            ->name('product-service-request.')
            ->group(function() {
                Route::get('/product-service-request', 'index')->name('index');
                Route::get('/product-service-request/create', 'create')->name('create');
            });

        // Corrective Action Request
        Route::controller(CorrectiveRequestController::class)
            ->name('corrective-action-request.')
            ->group(function() {
                Route::get('/corrective-action-request', 'index')->name('index');
                Route::get('/corrective-action-request/create', 'create')->name('create');
            });

    });


Route::prefix('Importation')
    ->middleware(['auth', 'verified'])
    ->group(function() {

    // Importation
        Route::controller(ShipmentOrderController::class)
            ->name('shipment-order.')
            ->group(function() {
                Route::get('/shipment-order', 'index')->name('index');
                Route::get('/shipment-order/create', 'create')->name('create');
            });

            Route::controller(ShipmentRegistryController::class)
            ->name('shipment-registry.')
            ->group(function() {
                Route::get('/shipment-registry', 'index')->name('index');
                Route::get('/shipment-registry/create', 'create')->name('create');
            });


    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
