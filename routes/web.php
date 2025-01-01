<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UomController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(ItemCategoryController::class)->group(function () {
    Route::get('item-category', 'index')->name('item-category.index');
    Route::post('save-item-category', 'store')->name('item-category.store');
});

Route::controller(UomController::class)->group(function () {
    Route::get('uom', 'index')->name('uom.index');
    Route::post('save-uom', 'store')->name('uom.store');
});

Route::controller(ItemController::class)->group(function (){
    Route::get('item', 'index')->name('item.index');
    Route::get('create-item', 'create')->name('item.create');
    Route::post('save-item', 'store')->name('item.store');
});

Route::controller(ReportController::class)->group(function (){
    Route::get('report-inbound', 'inbound')->name('report.inbound');
    Route::post('save-report-inbound', 'inbound_store')->name('report.inbound.store');
    Route::get('report-outbound', 'outbound')->name('report.outbound');
    Route::post('save-report-outbound', 'outbound_store')->name('report.outbound.store');
});