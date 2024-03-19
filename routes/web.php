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
use App\Http\Controllers\ValveRepair\ConstructionValveRepairController;
use App\Http\Controllers\ValveRepair\RepairReportController;
use App\Http\Controllers\ValveRepair\ScopeOfWorkController;
use App\Models\ValveRepair\ScopeOfWork;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Eproc\EprocDropdownCodeitemController;
// use App\Http\Controllers\Eproc\EproccodeitemController;
// use App\Http\Controllers\Eproc\EprocproductController;
use App\Http\Controllers\Eproc\EprocfboController;
use App\Http\Controllers\Catalog\Admin\CatalogcodeitemController;
use App\Http\Controllers\Catalog\Admin\CatalogDropdownCodeitemController;
use App\Http\Controllers\Catalog\Admin\CatalogproductController as AdminCatalogproductController;
use App\Http\Controllers\Catalog\Admin\CatalogDropdownProductController;
use App\Http\Controllers\Catalog\Frontend\CatalogproductController as FrontendCatalogproductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FiregasAssetController;
use App\Http\Controllers\Inventory\ProdinController;
use App\Http\Controllers\Inventory\ProdoutController;
use App\Http\Controllers\InventoryProductoutTransactionController;
use App\Http\Controllers\PsvMasterData\PdfController;
use App\Http\Controllers\ScanProductController;
use App\Models\Eproc\Catalog;
use App\Http\Controllers\ValveRepair\CalibrationValveRepairController;
use App\Http\Controllers\ValveRepair\OptionalServicesController;

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
    return view('auth.login');
});

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('process', 'authProcess')->name('auth.process');
    });

Route::prefix('request_order')->group(function () {
    Route::prefix('dashboard')
        ->controller(DashboardController::class)
        ->group(function () {
            Route::get('internal', 'indexInternal')->name('ro.dashboard.internal');
            Route::get('internal/rostatus', 'getRequestOrderStatus')->name('ro.dashboard.rostatus');
            Route::get('internal/roamount', 'getRequestOrderAmountStatus')->name('ro.dashboard.roamount');
            Route::get('external', 'indexExternal')->name('ro.dashboard.external');
            Route::get('external/chart/activities', 'getDataChartActivities')->name('ro.dashboard.external.chart.activities');
            Route::get('external/chart/activities/detail', 'getDetailChartActivities')->name('ro.dashboard.external.chart.activities.detail');
        });
});

Route::resource('client', ClientController::class)->except('create');
Route::prefix('client')
    ->controller(ClientController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('client.main.table');
    });

Route::resource('contract', ContractController::class)->only('show', 'store', 'edit', 'update', 'destroy');
Route::prefix('contract')
    ->controller(ContractController::class)
    ->group(function () {
        Route::get('show/dropdown', 'showOnDropdown')->name('contract.show.dropdown');
        Route::get('show/cards', 'showAsCards')->name('contract.show.cards');
    });

Route::resource('itemtype', ItemTypeController::class)->only('index', 'store', 'edit', 'update', 'destroy');
Route::prefix('itemtype')
    ->controller(ItemTypeController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('itemtype.main.table');
        Route::get('show/dropdown', 'showOnDropdown')->name('itemtype.show.dropdown');
    });

Route::resource('item', ItemController::class)->only('index', 'store', 'edit', 'update', 'destroy');
Route::prefix('item')
    ->controller(ItemController::class)
    ->group(function () {
        Route::get('show/dropdown', 'showOnDropdown')->name('item.show.dropdown');
        Route::get('show/datatable', 'showDatatable')->name('item.main.table');
    });

Route::resource('unitrate', UnitRateController::class)->only('index', 'store', 'edit', 'update', 'destroy');
Route::prefix('unitrate')
    ->controller(UnitRateController::class)
    ->group(function () {
        Route::get('show/dropdown', 'showOnDropdown')->name('unitrate.show.dropdown');
        Route::get('activity/show/dropdown', 'showActivityUnitrateOnDropdown')->name('unitrate.activity.show.dropdown');
        Route::get('show/datatable', 'showDatatable')->name('unitrate.main.table');
    });

Route::resource('activity', ActivityController::class)->only('index', 'store', 'edit', 'update', 'destroy');
Route::prefix('activity')
    ->controller(ActivityController::class)
    ->group(function () {
        Route::get('show/dropdown', 'showOnDropdown')->name('activity.show.dropdown');
        Route::get('show/datatable', 'showDatatable')->name('activity.main.table');
    });

Route::resource('costing', CostingController::class)->only('store', 'edit', 'update', 'destroy');
Route::prefix('costing')
    ->controller(CostingController::class)
    ->group(function () {
        Route::get('show/dropdown', 'showOnDropdown')->name('costing.show.dropdown');
        Route::get('show/datatable', 'showDatatable')->name('costing.table');
    });

Route::resource('contractactivity', ContractActivityController::class)->only('store', 'edit', 'update', 'destroy');
Route::prefix('contractactivity')
    ->controller(ContractActivityController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('contractactivity.table');
    });

Route::resource('requestorder', RequestOrderController::class)->except('create');
Route::prefix('requestorder')
    ->controller(RequestOrderController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('requestorder.main.table');
        Route::get('bycontract/show/datatable', 'showDatatableByContract')->name('requestorder.bycontract.main.table');
    });

Route::resource('requestorderitem', RequestOrderItemController::class)->except('create');
Route::prefix('requestorderitem')
    ->controller(RequestOrderItemController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('requestorderitem.main.table');
        Route::get('show/datatable/dashboard/external', 'showDatatableOnDashboardExternal')->name('requestorderitem.main.dashboard.external.table');
        Route::get('show/totalamount', 'showTotalAmount')->name('requestorderitem.totalamount');
    });

Route::resource('tablemap', MappingTableController::class)->except('show');
Route::prefix('tablemap')
    ->controller(MappingTableController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('tablemap.main.table');
    });

Route::prefix('customer-inventory')->group(function () {
    Route::resource('products', ProductController::class, [
        'as' => 'cina',
    ]);

    Route::prefix('products')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('dashboard/show', 'dashboard')->name('cina.products.dashboard');
            Route::get('show/datatable', 'showDatatable')->name('cina.products.main.table');
            Route::get('file/export', 'export')->name('cina.products.export');
            Route::post('file/import', 'import')->name('cina.products.import');
            Route::get('template/origin/{product}', 'formOriginTemplate')->name('cina.products.getformtemplate');
            Route::get('template/asset/{product}', 'formAssetTemplate')->name('cina.asset.getformtemplate');
        });
});

Route::prefix('cinaproductorigin')
    ->controller(CinaProductOriginController::class)
    ->group(function () {
        Route::get('selectbox/show', 'showOnDropdown')->name('cinaproductorigin.showondropdown');
        Route::post('selectbox/new', 'storeFromDropdown')->name('cinaproductorigin.storefromdropdown');
    });

Route::prefix('cinaassettype')
    ->controller(CinaAssetTypeController::class)
    ->group(function () {
        Route::get('selectbox/show', 'showOnDropdown')->name('cinaassettype.showondropdown');
        Route::post('selectbox/new', 'storeFromDropdown')->name('cinaassettype.storefromdropdown');
    });

Route::prefix('cinaproductuom')
    ->controller(CinaProductUomController::class)
    ->group(function () {
        Route::get('selectbox/show', 'showOnDropdown')->name('cinaproductuom.showondropdown');
        Route::post('selectbox/new', 'storeFromDropdown')->name('cinaproductuom.storefromdropdown');
    });
Route::resource('psvdatamaster', PsvdatamasterController::class);
Route::prefix('psvdatamaster')
    ->controller(PsvdatamasterController::class)
    ->group(function () {
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

// Route::resource('eproccodeitem', EproccodeitemController::class);
// Route::prefix('eproccodeitem')->controller(EproccodeitemController::class)->group(function () {
//     Route::get('show/dropdown', 'showOnDropdown')->name('eproccodeitem.show.dropdown');
//     Route::get('show/datatable', 'showDatatable')->name('eproccodeitem.main.table');
//     // Route::get('eproccodeitem/export', 'exportExcel')->name('eproccodeitem.export');
//     // Route::post('eproccodeitem/import', 'importExcel')->name('eproccodeitem.import');
//     // Route::get('/eproccodeitem/{id}', 'cetakPdf')->name('eproccodeitem.pdf');
//     // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

// });

// Route::resource('eprocproduct', EprocproductController::class);
// Route::prefix('eprocproduct')->controller(EprocproductController::class)->group(function () {
//     Route::get('show/dropdown', 'showOnDropdown')->name('eprocproduct.show.dropdown');
//     Route::get('show/datatable', 'showDatatable')->name('eprocproduct.main.table');

//     // Route::get('eprocproduct/catalog', 'catalogCart')->name('shopping.cart');

//     // Route::get('eproccodeitem/export', 'exportExcel')->name('eproccodeitem.export');
//     // Route::post('eproccodeitem/import', 'importExcel')->name('eproccodeitem.import');
//     // Route::get('/eproccodeitem/{id}', 'cetakPdf')->name('eproccodeitem.pdf');
//     // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

// });

// Route::prefix('dropdown/codeitem/')->controller(EprocDropdowncodeitemController::class)->group(function () {
//     Route::get('show', 'showOnDropdown')->name('eproc.options.showondropdown');
//     Route::post('new', 'storeFromDropdown')->name('eproc.options.storefromdropdown');
// });

Route::resource('eprocfbo', EprocfboController::class);
Route::prefix('eprocfbo')->controller(EprocfboController::class)->group(function () {
    Route::get('show/dropdown', 'showOnDropdown')->name('eprocfbo.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('eprocfbo.main.table');
    // Route::get('eproccodeitem/export', 'exportExcel')->name('eproccodeitem.export');
    // Route::post('eproccodeitem/import', 'importExcel')->name('eproccodeitem.import');
    // Route::get('/eproccodeitem/{id}', 'cetakPdf')->name('eproccodeitem.pdf');
    // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

});

Route::resource('catalogcodeitem', CatalogcodeitemController::class);
Route::prefix('catalogcodeitem')->controller(CatalogcodeitemController::class)->group(function () {
    Route::get('show/dropdown', 'showOnDropdown')->name('catalogccodeitem.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('catalogcodeitem.main.table');
    // Route::get('eproccodeitem/export', 'exportExcel')->name('eproccodeitem.export');
    Route::post('catalogcodeitem/import', 'importExcel')->name('catalogcodeitem.import');
    // Route::get('/eproccodeitem/{id}', 'cetakPdf')->name('eproccodeitem.pdf');
    // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

});

Route::prefix('dropdown/catalogcodeitem/')->controller(CatalogDropdowncodeitemController::class)->group(function () {
    Route::get('show', 'showOnDropdown')->name('catalog.options.showondropdown');
    Route::post('new', 'storeFromDropdown')->name('catalog.options.storefromdropdown');
});

Route::prefix('dropdown/options/')
    ->controller(DropdownOptionController::class)
    ->group(function () {
        Route::get('show', 'showOnDropdown')->name('general.options.showondropdown');
        Route::post('new', 'storeFromDropdown')->name('general.options.storefromdropdown');
    });

Route::resource('admin/catalogproduct', AdminCatalogproductController::class)->names([
    'index' => 'admin.catalogproduct.index',
    'create' => 'admin.catalogproduct.create',
    'store' => 'admin.catalogproduct.store',
    'show' => 'admin.catalogproduct.show',
    'edit' => 'admin.catalogproduct.edit',
    'update' => 'admin.catalogproduct.update',
    'destroy' => 'admin.catalogproduct.destroy',
]);

Route::prefix('admin/catalogproduct')->controller(AdminCatalogproductController::class)->group(function () {
    Route::get('show/dropdown', 'showOnDropdown')->name('admin.catalogproduct.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('admin.catalogproduct.main.table');
    Route::post('catalogproduct/import', 'importExcel')->name('catalogproduct.import');
});

Route::resource('frontend/catalogproduct', FrontendCatalogproductController::class)->names([
    'index' => 'frontend.catalogproduct.index',
    'create' => 'frontend.catalogproduct.create',
    'store' => 'frontend.catalogproduct.store',
    'show' => 'frontend.catalogproduct.show',
    'edit' => 'frontend.catalogproduct.edit',
    'update' => 'frontend.catalogproduct.update',
    'destroy' => 'frontend.catalogproduct.destroy',
]);

Route::prefix('frontend/catalogproduct')->controller(FrontendCatalogproductController::class)->group(function () {
    Route::get('show/dropdown', 'showOnDropdown')->name('frontend.catalogproduct.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('frontend.catalogproduct.main.table');
});

Route::resource('inventory/prodin', ProdinController::class)->names([
    'index' => 'inventory.prodin.index',
    'create' => 'inventory.prodin.create',
    'store' => 'inventory.prodin.store',
    'show' => 'inventory.prodin.show',
    'edit' => 'inventory.prodin.edit',
    'update' => 'inventory.prodin.update',
    'destroy' => 'inventory.prodin.destroy',
]);

Route::prefix('inventory/prodin')
    ->controller(ProdinController::class)
    ->name('prodin.')
    ->group(function () {
        Route::get('show/dashboard','showDashboard')->name('dashboard');
    });

Route::prefix('inventory/product/scan')
    ->controller(ScanProductController::class)
    ->name('inv.qrcode.')
    ->group(function () {
        Route::get('/','index')->name('index');
        Route::get('detail','getProductDetail')->name('product.details');
    });

Route::resource('prodin', ProdinController::class);
Route::prefix('prodin')->controller(ProdinController::class)->group(function () {
    Route::get('show/dropdown', 'showOnDropdown')->name('prodin.show.dropdown');
    Route::get('show/datatable', 'showDatatable')->name('prodin.main.table');
    Route::get('loadprofile/{catalogProduct}', 'loadprofilefromproductname')->name('prodin.loadprofile.productname');
    Route::get('loadprofile/itemcode', 'loadprofilefromitemcode')->name('prodin.loadprofile.itemcode');
    // Route::get('eproccodeitem/export', 'exportExcel')->name('eproccodeitem.export');
    Route::post('prodin/import', 'importExcel')->name('prodin.import');
    // Route::get('/eproccodeitem/{id}', 'cetakPdf')->name('eproccodeitem.pdf');
    // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');
});

Route::prefix('inventory/prodout')
    ->controller(ProdoutController::class)
    ->name('inventory.prodout.')
    ->group(function () {
        Route::resource('/',ProdoutController::class)->parameters(['' => 'prodout']);
        Route::get('show/dropdown', 'showOnDropdown')->name('show.dropdown');
        Route::get('show/datatable', 'showDatatable')->name('main.table');
        Route::get('loadprofile/product_name', 'loadprofilefromproduct_name')->name('loadprofile.product_name');
    });

Route::prefix('inventory/product/out')
    ->controller(InventoryProductoutTransactionController::class)
    ->name('inventory.product.out.')
    ->group(function () {
        Route::resource('/',InventoryProductoutTransactionController::class)->parameters(['' => 'inventoryProductoutTransaction']);
        Route::get('show/datatable', 'showDatatable')->name('main.table');
    });

Route::prefix('employee')
    ->controller(EmployeeController::class)
    ->name('employee.')
    ->group(function () {
        Route::get('show/dropdown', 'showOnDropdown')->name('show.dropdown');
    });

// Route::resource('inventory/prodout', ProdoutController::class)->names([
//     'index' => 'inventory.prodout.index',
//     'create' => 'inventory.prodout.create',
//     'store' => 'inventory.prodout.store',
//     'show' => 'inventory.prodout.show',
//     'edit' => 'inventory.prodout.edit',
//     'update' => 'inventory.prodout.update',
//     'destroy' => 'inventory.prodout.destroy',
// ]);

// Route::resource('prodout', ProdoutController::class);

// Route::prefix('prodout')->controller(ProdoutController::class)->group(function () {
//     Route::get('show/dropdown', 'showOnDropdown')->name('prodout.show.dropdown');
//     Route::get('show/datatable', 'showDatatable')->name('prodout.main.table');
//     Route::get('loadprofile/product_name', 'loadprofilefromproduct_name')->name('prodout.loadprofile.product_name');

    // Route::get('eproccodeitem/export', 'exportExcel')->name('eproccodeitem.export');
    // Route::post('eproccodeitem/import', 'importExcel')->name('eproccodeitem.import');
    // Route::get('/eproccodeitem/{id}', 'cetakPdf')->name('eproccodeitem.pdf');
    // Route::post('/upload-cert-doc', 'uploadCertDoc')->name('upload.cert.doc');

// });

Route::prefix('catalog')
    ->name('catalog.')
    ->controller(CatalogDropdownProductController::class)
    ->group(function () {
        Route::get('product/details', 'showOnDropdown')->name('product.details');
    });



Route::resource('valverepair', RepairReportController::class)->except('create');
Route::prefix('valverepair')
    ->controller(RepairReportController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('valverepair.main.table');
        Route::post('construction/deleteimage', 'destroyImage')->name('valverepair.delete.image');
    });
Route::resource('valverepair/scopeofwork', ScopeOfWorkController::class)->names([
    'show' => 'valverepair.scopeofwork.show',
    'store' => 'valverepair.scopeofwork.store',
]);
Route::prefix('scopeofwork')
    ->controller(ScopeOfWorkController::class)
    ->group(function () {
        Route::get('show/datatable', 'showDatatable')->name('scopeofwork.main.table');
    });

Route::prefix('cvrepair')
    ->controller(ConstructionValveRepairController::class)
    ->group(function () {
        Route::post('scopeofwork/constructionbody', 'storeConstructionBody')->name('valverepair.scopeofwork.store.constructionbody');
        Route::get('scopeofwork/constructionbody/{id}', 'editConstructionBody')->name('valverepair.scopeofwork.get.constructionbody');
        Route::put('scopeofwork/constructionbody/{consIsolValve}', 'updateConstructionBody')->name('valverepair.scopeofwork.update.constructionbody');
        Route::get('scopeofwork/constructionactuatorwheel/{consIsolValve}', 'editConstructionActuatorWheel')->name('valverepair.scopeofwork.get.constructionactuatorwheel');
        Route::put('scopeofwork/constructionactuatorwheel/{consIsolValve}', 'storeConstructionActuatorWheel')->name('valverepair.scopeofwork.store.constructionactuatorwheel');
        Route::get('scopeofwork/constructionactuatorautomation/{consIsolValve}', 'editConstructionActuatorAutomation')->name('valverepair.scopeofwork.get.constructionactuatorautomation');
        Route::get('scopeofwork/constructionactuatorautomation/{consIsolValve}', 'editConstructionActuatorAutomation')->name('valverepair.scopeofwork.get.constructionactuatorautomation');
        Route::put('scopeofwork/constructionactuatorautomation/{consIsolValve}', 'storeConstructionActuatorAutomation')->name('valverepair.scopeofwork.store.constructionactuatorautomation');
        Route::get('scopeofwork/constructionpositionerisolation/{consIsolValve}', 'editConstructionPositionerIsolation')->name('valverepair.scopeofwork.get.constructionpositionerisolation');
        Route::put('scopeofwork/constructionpositionerisolation/{consIsolValve}', 'storeConstructionPositionerIsolation')->name('valverepair.scopeofwork.store.constructionpositionerisolation');
        Route::get('scopeofwork/constructionaccesoriesisolation/{consIsolValve}', 'editConstructionAccessoriesIsolation')->name('valverepair.scopeofwork.get.constructionaccesoriesisolation');
        Route::put('scopeofwork/constructionaccesoriesisolation/{consIsolValve}', 'storeConstructionAccessoriesIsolation')->name('valverepair.scopeofwork.store.constructionaccesoriesisolation');
    });

# calibration
Route::prefix('valverepair/calibration')
    ->controller(CalibrationValveRepairController::class)
    ->name('valverepair.calibration.')
    ->group(function () {
        Route::resource('/', CalibrationValveRepairController::class)->parameters(['' => 'calibration']);
        Route::get('calibration/getdata', 'getData')->name('getdata');
    });

# Optional Services
Route::prefix('valverepair/optionalservices')
    ->controller(OptionalServicesController::class)
    ->name('valverepair.optionalservices.')
    ->group(function () {
        // Route::resource('/', OptionalServicesController::class)->parameters(['' => 'optionalservices']);
        Route::get('/valvepretest/{id}', 'getOptionalServiceValvePreTest')->name('get.valvepretest');
        Route::post('/valvepretest', 'storeOptionalServiceValvePreTest')->name('store.valvepretest');
        Route::put('valvepretest/{optionalservice}', 'updateOptionalServiceValvePreTest')->name('update.valvepretest');

        Route::get('valvepretest/materialverification/{scopeofworkid}', 'getMaterialverification')->name('get.materialverification');
        Route::put('valvepretest/materialverification/{optionalservice}', 'updateMaterialverification')->name('update.materialverification');
    });

# Fire Gas Asset
Route::prefix('firegas')
    ->controller(FiregasAssetController::class)
    ->name('firegas.')
    ->group(function () {
        Route::resource('/', FiregasAssetController::class)->parameters(['' => 'firegasAsset']);
        Route::get('show/datatable', 'showDatatable')->name('main.table');
        Route::post('file/import', 'import')->name('data.import');
        Route::get('show/dashboard', 'dashboard')->name('dashboard');
    });
