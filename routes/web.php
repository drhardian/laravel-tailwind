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
use App\Http\Controllers\RequestOrderController;
use App\Http\Controllers\RequestOrderItemController;
use App\Http\Controllers\UnitRateController;
use App\Http\Controllers\PsvMasterData\PsvdatamasterController;




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

Route::prefix('request_order')->group(function() {
    Route::prefix('dashboard')->controller(DashboardController::class)->group(function() {
        Route::get('internal', 'indexInternal')->name('ro.dashboard.internal');
        Route::get('internal/rostatus', 'getRequestOrderStatus')->name('ro.dashboard.rostatus');
        Route::get('internal/roamount', 'getRequestOrderAmountStatus')->name('ro.dashboard.roamount');
        Route::get('external', 'indexExternal')->name('ro.dashboard.external');
    });
});

Route::resource('client', ClientController::class)->except('create');
Route::prefix('client')->controller(ClientController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('client.main.table');
});

Route::resource('contract', ContractController::class)->only('show','store','edit','update','destroy');
Route::prefix('contract')->controller(ContractController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('contract.show.dropdown');
    Route::get('show/cards', 'showAsCards')->name('contract.show.cards');
});

Route::resource('itemtype', ItemTypeController::class)->only('index','store','edit','update','destroy');
Route::prefix('itemtype')->controller(ItemTypeController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('itemtype.main.table');
    Route::get('show/dropdown', 'showOnDropdown')->name('itemtype.show.dropdown');
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
    Route::get('show/dropdown', 'showOnDropdown')->name('costing.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('costing.table');
});

Route::resource('contractactivity', ContractActivityController::class)->only('store','edit','update','destroy');
Route::prefix('contractactivity')->controller(ContractActivityController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('contractactivity.table');
});

Route::resource('requestorder', RequestOrderController::class)->except('create');
Route::prefix('requestorder')->controller(RequestOrderController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('requestorder.main.table');
});

Route::resource('requestorderitem', RequestOrderItemController::class)->except('create');
Route::prefix('requestorderitem')->controller(RequestOrderItemController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('requestorderitem.main.table');
    Route::get('show/totalamount', 'showTotalAmount')->name('requestorderitem.totalamount');
});

Route::resource('psvdatamaster', PsvdatamasterController::class);
Route::prefix('psvdatamaster')->controller(PsvdatamasterController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('psvdatamaster.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('psvdatamaster.main.table');
    Route::get('psvdatamaster/export', 'PsvMasterData\PsvdatamasterController@exportExcel')->name('psvdatamaster.export');
    Route::post('psvdatamaster/import', 'PsvMasterData\svdatamasterController@importExcel')->name('general.import');

});
