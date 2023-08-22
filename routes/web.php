<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractActivityController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CostingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\UnitRateController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('process', 'authProcess')->name('auth.process');
});

Route::prefix('dashboard')->controller(DashboardController::class)->group(function() {
    Route::get('/', 'index');
});

Route::resource('client', ClientController::class)->except('create','edit');
Route::prefix('client')->controller(ClientController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('client.main.table');
});

Route::prefix('contract')->controller(ContractController::class)->group(function() {
    Route::get('show/{contract}', 'show')->name('contract.show');
});

Route::resource('itemtype', ItemTypeController::class)->only('index','store','edit','update','destroy');
Route::prefix('itemtype')->controller(ItemTypeController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('itemtype.main.table');
});

Route::resource('item', ItemController::class)->only('index','store','edit','update','destroy');
Route::prefix('item')->controller(ItemController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('item.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('item.main.table');
});

Route::resource('unitrate', UnitRateController::class)->only('index','store','edit','update','destroy');
Route::prefix('unitrate')->controller(UnitRateController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('unitrate.show.dropdown');
    Route::get('activity/show/dropdown', 'showActivityUnitrateOnDropdown')->name('unitrate.activity.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('unitrate.main.table');
});

Route::resource('activity', ActivityController::class)->only('index','store','edit','update','destroy');
Route::prefix('activity')->controller(ActivityController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('activity.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('activity.main.table');
});

Route::resource('costing', CostingController::class)->only('store','edit','update','destroy');
Route::prefix('costing')->controller(CostingController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('costing.table');
});

Route::resource('contractactivity', ContractActivityController::class)->only('store','edit','update','destroy');
Route::prefix('contractactivity')->controller(ContractActivityController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('contractactivity.table');
});
