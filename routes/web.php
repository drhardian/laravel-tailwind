<?php

use App\Http\Controllers\CustomerAsset\ProductController;
use App\Http\Controllers\RequestOrder\ActivityController;
use App\Http\Controllers\RequestOrder\AuthController;
use App\Http\Controllers\RequestOrder\ClientController;
use App\Http\Controllers\RequestOrder\ContractActivityController;
use App\Http\Controllers\RequestOrder\ContractController;
use App\Http\Controllers\RequestOrder\CostingController;
use App\Http\Controllers\RequestOrder\DashboardController;
use App\Http\Controllers\RequestOrder\ItemController;
use App\Http\Controllers\RequestOrder\ItemTypeController;
use App\Http\Controllers\RequestOrder\RequestOrderController;
use App\Http\Controllers\RequestOrder\RequestOrderItemController;
use App\Http\Controllers\RequestOrder\UnitRateController;
use App\Http\Controllers\MappingTable\MappingTableController;
use App\Http\Controllers\ValveRepair\RepairReportController;
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
        Route::get('external/chart/activities', 'getDataChartActivities')->name('ro.dashboard.external.chart.activities');
        Route::get('external/chart/activities/detail', 'getDetailChartActivities')->name('ro.dashboard.external.chart.activities.detail');
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
    Route::get('bycontract/show/datatable', 'showDatatableByContract')->name('requestorder.bycontract.main.table');
});

Route::resource('requestorderitem', RequestOrderItemController::class)->except('create');
Route::prefix('requestorderitem')->controller(RequestOrderItemController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('requestorderitem.main.table');
    Route::get('show/datatable/dashboard/external', 'showDatatableOnDashboardExternal')->name('requestorderitem.main.dashboard.external.table');
    Route::get('show/totalamount', 'showTotalAmount')->name('requestorderitem.totalamount');
});

Route::resource('tablemap', MappingTableController::class)->except('show');
Route::prefix('tablemap')->controller(MappingTableController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('tablemap.main.table');
});

Route::resource('products', ProductController::class);
Route::prefix('products')->controller(ProductController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('products.main.table');
    Route::get('export', [ProductController::class, 'export'])->name('products.export');
    Route::post('import', [ProductController::class, 'import'])->name('products.import');
    // Route::post('import', [ProductController::class, 'handleImport'])->name('products.handleImport');
});

Route::resource('valverepair', RepairReportController::class)->except('create');
Route::prefix('valverepair')->controller(RepairReportController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('valverepair.main.table');
    Route::post('construction/deleteimage', 'destroyImage')->name('valverepair.delete.image');
    Route::post('constructionbody', 'storeConstructionBody')->name('valverepair.store.constructionbody');
    Route::get('constructionbody/{id}', 'editConstructionBody')->name('valverepair.get.constructionbody');
    Route::put('constructionbody/{consIsolValve}', 'updateConstructionBody')->name('valverepair.update.constructionbody');
    Route::get('constructionactuatorwheel/{consIsolValve}', 'editConstructionActuatorWheel')->name('valverepair.get.constructionactuatorwheel');
    Route::put('constructionactuatorwheel/{consIsolValve}', 'storeConstructionActuatorWheel')->name('valverepair.store.constructionactuatorwheel');
    Route::get('constructionactuatorautomation/{consIsolValve}', 'editConstructionActuatorAutomation')->name('valverepair.get.constructionactuatorautomation');
    Route::put('constructionactuatorautomation/{consIsolValve}', 'storeConstructionActuatorAutomation')->name('valverepair.store.constructionactuatorautomation');
    Route::get('constructionpositionerisolation/{consIsolValve}', 'editConstructionPositionerIsolation')->name('valverepair.get.constructionpositionerisolation');
    Route::put('constructionpositionerisolation/{consIsolValve}', 'storeConstructionPositionerIsolation')->name('valverepair.store.constructionpositionerisolation');
    Route::get('constructionaccesoriesisolation/{consIsolValve}', 'editConstructionAccessoriesIsolation')->name('valverepair.get.constructionaccesoriesisolation');
    Route::put('constructionaccesoriesisolation/{consIsolValve}', 'storeConstructionAccessoriesIsolation')->name('valverepair.store.constructionaccesoriesisolation');


});
