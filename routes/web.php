<?php

use App\Http\Controllers\CustomerAsset\CinaAssetTypeController;
use App\Http\Controllers\CustomerAsset\CinaProductOriginController;
use App\Http\Controllers\CustomerAsset\CinaProductUomController;
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
use App\Http\Controllers\PsvMasterData\PsvdatamasterController;
use App\Http\Controllers\PsvMasterData\PsvdashboardController;
use App\Http\Controllers\DropdownOptionController;
use App\Http\Controllers\Eproc\EprocDropdownItemcodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Eproc\EprocitemcodeController;
use App\Http\Controllers\Eproc\EprocproductController;
use App\Http\Controllers\PsvMasterData\PdfController;

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

Route::prefix('customer-inventory')->group(function() {
    Route::resource('products', ProductController::class, [
        'as' => 'cina'
    ]);

    Route::prefix('products')->controller(ProductController::class)->group(function() {
        Route::get('show/datatable', 'showDatatable')->name('cina.products.main.table');
        Route::get('export', 'export')->name('cina.products.export');
        Route::post('import', 'import')->name('cina.products.import');
        Route::get('template/origin/{product}', 'formOriginTemplate')->name('cina.products.getformtemplate');
        Route::get('template/asset/{product}', 'formAssetTemplate')->name('cina.asset.getformtemplate');
    });
});

Route::prefix('cinaproductorigin')->controller(CinaProductOriginController::class)->group(function() {
    Route::get('selectbox/show', 'showOnDropdown')->name('cinaproductorigin.showondropdown');
    Route::post('selectbox/new', 'storeFromDropdown')->name('cinaproductorigin.storefromdropdown');
});

Route::prefix('cinaassettype')->controller(CinaAssetTypeController::class)->group(function() {
    Route::get('selectbox/show', 'showOnDropdown')->name('cinaassettype.showondropdown');
    Route::post('selectbox/new', 'storeFromDropdown')->name('cinaassettype.storefromdropdown');
});

Route::prefix('cinaproductuom')->controller(CinaProductUomController::class)->group(function() {
    Route::get('selectbox/show', 'showOnDropdown')->name('cinaproductuom.showondropdown');
    Route::post('selectbox/new', 'storeFromDropdown')->name('cinaproductuom.storefromdropdown');
});
Route::resource('psvdatamaster', PsvdatamasterController::class);
Route::prefix('psvdatamaster')->controller(PsvdatamasterController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('psvdatamaster.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('psvdatamaster.main.table');
    Route::get('psvdatamaster/export', 'exportExcel')->name('psvdatamaster.export');
    Route::post('psvdatamaster/import', 'importExcel')->name('psvdatamaster.import');
    Route::get('/psvdatamaster/{id}', 'cetakPdf')->name('psvdatamaster.pdf');
    Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

});

// Route::get('/cetak-pdf/{id}', [PdfController::class, 'cetakPdf'])->name('pdf.cetak');

Route::get('/psvdashboard', [PsvdashboardController::class, 'index'])->name('psvdashboard');
// Route::get('/psvdashboard', 'getPSVOperational')->name('psvoperational');

Route::prefix('dropdown/options/')->controller(DropdownOptionController::class)->group(function() {
    Route::get('show', 'showOnDropdown')->name('general.options.showondropdown');
    Route::post('new', 'storeFromDropdown')->name('general.options.storefromdropdown');
});

Route::resource('eprocitemcode', EprocitemcodeController::class);
Route::prefix('eprocitemcode')->controller(EprocitemcodeController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('eprocitemcode.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('eprocitemcode.main.table');
    // Route::get('eprocitemcode/export', 'exportExcel')->name('eprocitemcode.export');
    // Route::post('eprocitemcode/import', 'importExcel')->name('eprocitemcode.import');
    // Route::get('/eprocitemcode/{id}', 'cetakPdf')->name('eprocitemcode.pdf');
    // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

});

Route::resource('eprocproduct', EprocproductController::class);
Route::prefix('eprocproduct')->controller(EprocproductController::class)->group(function() {
    Route::get('show/dropdown', 'showOnDropdown')->name('eprocproduct.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('eprocproduct.main.table');
    // Route::get('eprocitemcode/export', 'exportExcel')->name('eprocitemcode.export');
    // Route::post('eprocitemcode/import', 'importExcel')->name('eprocitemcode.import');
    // Route::get('/eprocitemcode/{id}', 'cetakPdf')->name('eprocitemcode.pdf');
    // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

});

Route::prefix('dropdown/itemcode/')->controller(EprocDropdownItemcodeController::class)->group(function() {
    Route::get('show', 'showOnDropdown')->name('eproc.options.showondropdown');
    Route::post('new', 'storeFromDropdown')->name('eproc.options.storefromdropdown');
});

