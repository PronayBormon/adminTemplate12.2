<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\UploadController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\Pages\DynamicPagesController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingsController;
use App\Http\Controllers\Web\Backend\users\usercontroller;

Route::prefix('admin')->middleware('auth:sanctum', 'admin')->group(function () {

    // Chunk Upload component url 
    Route::post('/upload/chunk', [UploadController::class, 'chunk'])
        ->name('admin.upload.chunk');


    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard.index');
    });
    Route::controller(DynamicPagesController::class)->group(function () {
        Route::get('/pages', 'index')->name('admin.pages.index');
        Route::get('/pages/edit/{id}', 'edit')->name('admin.pages.edit');
        Route::get('/pages/delete/{id}', 'destroy')->name('admin.pages.edit');
        Route::put('/pages/update/{id}', 'update')->name('admin.pages.update');
    });

    Route::controller(SystemSettingsController::class)->group(function () {
        Route::get('/system/settings', 'index')->name('admin.dashboard.system.settings');
        Route::post('/system/settings', 'SystemUpdate')->name('admin.dashboard.system.settings.update');
    });

    Route::controller(usercontroller::class)->prefix('users')->group(function () {
        Route::get('list', 'userlist')->name('admin.users.index');
        Route::get('create', 'usercreate')->name('admin.users.create');
        Route::post('store', 'userstore')->name('admin.users.store');
        Route::get('edit/{id}', 'useredit')->name('admin.users.edit');
        Route::put('update/{id}', 'userupdate')->name('admin.users.update');
    });
});
