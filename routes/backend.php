<?php

use App\Http\Controllers\Web\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard.index');
    });
});
