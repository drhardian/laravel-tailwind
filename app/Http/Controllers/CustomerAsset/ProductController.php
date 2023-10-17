<?php

namespace App\Http\Controllers\CustomerAsset;

use App\Http\Controllers\Controller;
use App\Imports\SpareUnitValveImport;
use App\Models\CustomerAsset\CinaAssetType;
use App\Models\CustomerAsset\CinaProduct;
use App\Models\CustomerAsset\CinaProductLocation;
use App\Models\CustomerAsset\CinaProductOrigin;
use Exception;
use ParseError;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Picqer\Barcode\BarcodeGeneratorHTML;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Assets - Valve';
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customer_asset.products.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->pageTitle = 'New';

        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'Spare Unit - Valve',
                'status' => 'active',
                'url' => route('products.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customer_asset.products.create', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $product_code = IdGenerator::generate([
    //         'table' => 'products',
    //         'field' => 'product_code',
    //         'length' => 4,
    //         'prefix' => 'Vlv'
    //     ]);

    //     $rules = [
    //         'product_image' => 'image|file|max:2048',
    //         'product_status' => 'nullable|string',
    //         'product_assetID' => 'nullable|string',
    //         'product_newassetID' => 'nullable|string',
    //         'product_equip' => 'nullable|string',
    //         'product_type' => 'nullable|string',
    //         'product_end' => 'nullable|string',
    //         'product_size' => 'nullable|string',
    //         'product_rating' => 'nullable|string',
    //         'product_brand' => 'nullable|string',
    //         'product_valvemodel' => 'nullable|string',
    //         'product_serial' => 'nullable|string',
    //         'product_condi' => 'nullable|string',
    //         'product_actbrand' => 'nullable|string',
    //         'product_acttype' => 'nullable|string',
    //         'product_actsize' => 'nullable|string',
    //         'product_fail' => 'nullable|string',
    //         'product_actcond' => 'nullable|string',
    //         'product_posbrand' => 'nullable|string',
    //         'product_posmodel' => 'nullable|string',
    //         'product_inputsignal' => 'nullable|string',
    //         'product_poscond' => 'nullable|string',
    //         'product_other' => 'nullable|string',
    //         'product_datein' => 'nullable|date',
    //         'product_transfer' => 'nullable|string',
    //         'product_reser' => 'nullable|string',
    //         'product_origin' => 'nullable|string',
    //         'product_sdvin' => 'nullable|string',
    //         'product_sdvout' => 'nullable|string',
    //         'product_station' => 'nullable|string',
    //         'product_requestor' => 'nullable|string',
    //         'product_project' => 'nullable|string',
    //         'product_dateout' => 'nullable|date',
    //         'product_dateoffshore' => 'nullable|date',
    //         'product_tfoffshore' => 'nullable|string',
    //         'product_curloc' => 'nullable|string',
    //         'product_stockin' => 'nullable|integer',
    //         'product_docin' => 'mimes:doc,pdf|max:2048',
    //         'product_stockout' => 'nullable|integer',
    //         'product_docout' => 'mimes:doc,pdf|max:2048',
    //         'product_stockqty' => 'nullable|integer',
    //         'product_uom' => 'nullable|string',
    //         'product_targetpdn' => 'nullable|date',
    //         'product_csrelease' => 'nullable|string',
    //         'product_csnumber' => 'nullable|string',
    //         'product_cenumber' => 'nullable|string',
    //         'product_ronumber' => 'nullable|string',
    //         'product_startdate' => 'nullable|date',
    //         'product_enddate' => 'nullable|date',
    //         'product_price' => 'nullable|string',
    //         'product_remark' => 'nullable|string',
    //     ];

    //     $validatedData = $request->validate($rules);

    //     // Save product code value
    //     $validatedData['product_code'] = $product_code;

    //     /**
    //      * Handle upload image
    //      */
    //     if ($file = $request->file('product_image')) {
    //         $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $path = 'public/assets/img/products/';

    //         /**
    //          * Upload an image to Storage
    //          */
    //         $file->storeAs($path, $fileName);
    //         $fileName = 'storage/assets/img/products/' . $fileName;
    //         $validatedData['product_image'] = $fileName;
    //     }

    //     /**
    //      * Handle upload pdf docin
    //      */
    //     if ($file = $request->file('product_docin')) {
    //         $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $path = 'public/assets/documents/products/';

    //         /**
    //          * Upload an docin to Storage
    //          */
    //         $file->storeAs($path, $fileName);
    //         $fileName = 'storage/assets/documents/products/' . $fileName;
    //         $validatedData['product_docin'] = $fileName;
    //     }

    //     /**
    //      * Handle upload pdf docout
    //      */
    //     if ($file = $request->file('product_docout')) {
    //         $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $path = 'public/assets/documents/products/';

    //         /**
    //          * Upload an docout to Storage
    //          */
    //         $file->storeAs($path, $fileName);
    //         $fileName = 'storage/assets/documents/products/' . $fileName;
    //         $validatedData['product_docout'] = $fileName;
    //     }

    //     Product::create($validatedData);

    //     return Redirect::route('products.index')->with('success', 'Product has been created!');
    // }

    public function show(CinaProduct $product)
    {
        // Generate a barcode
        $generator = new BarcodeGeneratorHTML();
        $code = $product->product_code ?? '';

        if (!empty($code)) {
            $barcode = $generator->getBarcode($code, $generator::TYPE_CODE_128);
        } else {
            $barcode = ''; // Set an empty barcode if $code is empty or null
        }

        return view('products.show', [
            'product' => $product,
            'barcode' => $barcode,
        ]);
    }

    // public function download($id)
    // {
    //     $product = Product::findOrFail($id); // Ganti dengan model yang sesuai

    //     $pdf = PDF::loadView('products.show-pdf', compact('product')); // Ganti dengan view yang sesuai

    //     $filename = 'product_' . $id . '.pdf';

    //     return $pdf->download($filename);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CinaProduct $product)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Product $product)
    // {
    //     $rules = [
    //         'product_image' => 'image|file|max:2048',
    //         'product_status' => 'nullable|string',
    //         'product_assetID' => 'nullable|string',
    //         'product_newassetID' => 'nullable|string',
    //         'product_equip' => 'nullable|string',
    //         'product_type' => 'nullable|string',
    //         'product_end' => 'nullable|string',
    //         'product_size' => 'nullable|string',
    //         'product_rating' => 'nullable|string',
    //         'product_brand' => 'nullable|string',
    //         'product_valvemodel' => 'nullable|string',
    //         'product_serial' => 'nullable|string',
    //         'product_condi' => 'nullable|string',
    //         'product_actbrand' => 'nullable|string',
    //         'product_acttype' => 'nullable|string',
    //         'product_actsize' => 'nullable|string',
    //         'product_fail' => 'nullable|string',
    //         'product_actcond' => 'nullable|string',
    //         'product_posbrand' => 'nullable|string',
    //         'product_posmodel' => 'nullable|string',
    //         'product_inputsignal' => 'nullable|string',
    //         'product_poscond' => 'nullable|string',
    //         'product_other' => 'nullable|string',
    //         'product_datein' => 'nullable|date',
    //         'product_transfer' => 'nullable|string',
    //         'product_reser' => 'nullable|string',
    //         'product_origin' => 'nullable|string',
    //         'product_sdvin' => 'nullable|string',
    //         'product_sdvout' => 'nullable|string',
    //         'product_station' => 'nullable|string',
    //         'product_requestor' => 'nullable|string',
    //         'product_project' => 'nullable|string',
    //         'product_dateout' => 'nullable|date',
    //         'product_dateoffshore' => 'nullable|date',
    //         'product_tfoffshore' => 'nullable|string',
    //         'product_curloc' => 'nullable|string',
    //         'product_stockin' => 'nullable|integer',
    //         'product_docin' => 'mimes:doc,pdf|max:2048',
    //         'product_stockout' => 'nullable|integer',
    //         'product_docout' => 'mimes:doc,pdf|max:2048',
    //         'product_stockqty' => 'nullable|integer',
    //         'product_uom' => 'nullable|string',
    //         'product_targetpdn' => 'nullable|date',
    //         'product_csrelease' => 'nullable|string',
    //         'product_csnumber' => 'nullable|string',
    //         'product_cenumber' => 'nullable|string',
    //         'product_ronumber' => 'nullable|string',
    //         'product_startdate' => 'nullable|date',
    //         'product_enddate' => 'nullable|date',
    //         'product_price' => 'nullable|string',
    //         'product_remark' => 'nullable|string',
    //     ];

    //     $validatedData = $request->validate($rules);

    //     /**
    //      * Handle upload an image
    //      */
    //     if ($file = $request->file('product_image')) {
    //         $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $path = 'public/assets/img/products/';

    //         /**
    //          * Delete photo if exists.
    //          */
    //         if ($product->product_image) {
    //             $result = str_replace('storage/', '', $product->product_image);
    //             Storage::delete('public/' . $result);
    //         }

    //         /**
    //          * Store an image to Storage
    //          */
    //         $file->storeAs($path, $fileName);
    //         $fileName = 'storage/assets/img/products/' . $fileName;
    //         $validatedData['product_image'] = $fileName;
    //     }

    //     /**
    //      * Handle upload an docin
    //      */
    //     if ($file = $request->file('product_docin')) {
    //         $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $path = 'public/assets/documents/products/';

    //         /**
    //          * Delete docin if exists.
    //          */
    //         if ($product->product_docin) {
    //             $result = str_replace('storage/', '', $product->product_docin);
    //             Storage::delete('public/' . $result);
    //         }

    //         /**
    //          * Store an docin to Storage
    //          */
    //         $file->storeAs($path, $fileName);
    //         $fileName = 'storage/assets/documents/products/' . $fileName;
    //         $validatedData['product_docin'] = $fileName;
    //     }

    //     /**
    //      * Handle upload an docout
    //      */
    //     if ($file = $request->file('product_docout')) {
    //         $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $path = 'public/assets/documents/products/';

    //         /**
    //          * Delete docout if exists.
    //          */
    //         if ($product->product_docout) {
    //             $result = str_replace('storage/', '', $product->product_docout);
    //             Storage::delete('public/' . $result);
    //         }

    //         /**
    //          * Store an docout to Storage
    //          */
    //         $file->storeAs($path, $fileName);
    //         $fileName = 'storage/assets/documents/products/' . $fileName;
    //         $validatedData['product_docout'] = $fileName;
    //     }



    //     Product::where('id', $product->id)->update($validatedData);

    //     return Redirect::route('products.index')->with('success', 'Product has been updated!');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Product $product)
    // {
    //     /**
    //      * Delete photo if exists.
    //      */
    //     if ($product->product_image) {
    //         $result = str_replace('storage/', '', $product->product_image);
    //         Storage::delete('public/' . $result);
    //     }

    //     /**
    //      * Delete docin if exists.
    //      */
    //     if ($product->product_docin) {
    //         $result = str_replace('storage/', '', $product->product_docin);
    //         Storage::delete('public/' . $result);
    //     }

    //     /**
    //      * Delete docout if exists.
    //      */
    //     if ($product->product_docout) {
    //         $result = str_replace('storage/', '', $product->product_docout);
    //         Storage::delete('public/' . $result);
    //     }

    //     Product::destroy($product->id);

    //     return Redirect::route('products.index')->with('success', 'Product has been deleted!');
    // }

    /**
     * Handle export data products.
     */
    public function import(Request $request)
    {
        try {
            Excel::import(new SpareUnitValveImport, $request->file('filexls'));

            return response()->json([
                'message' => 'Data imported successfully'
            ], 200);
        } catch (ParseError $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle export data products.
     */
    // function export()
    // {
    //     $products = Product::all()->sortBy('product_type');

    //     $product_array[] = array(
    //         'Old ID',
    //         'New ID',
    //         'Equipment',
    //         'Valve Type',
    //         'End Connection',
    //         'Valve Size (Inch)',
    //         'Valve Rating',
    //         'Valve Brand',
    //         'Valve Model',
    //         'Serial Number',
    //         'Valve Condition',
    //         'Actuator Brand',
    //         'Actuator Type',
    //         'Actuator Size',
    //         'Fail Position',
    //         'Actuator Condition',
    //         'Positioner Brand',
    //         'Positioner Model',
    //         'Input Signal',
    //         'Positioner Condition',
    //         'Other Accessories',
    //         'Date In',
    //         'Material Transfer',
    //         'Reservation Number',
    //         'Ex Station',
    //         'SDV In',
    //         'SDV Out',
    //         'Station',
    //         'Requestor',
    //         'Project',
    //         'Date Out',
    //         'Date to offshore',
    //         'Material transfer to offshore',
    //         'Current Location',
    //         'Stock In',
    //         'Dok Stok In',
    //         'Stock Out',
    //         'Dok Stok Out',
    //         'Stock Quality',
    //         'UOM',
    //         'TARGET PDN',
    //         'CS Release',
    //         'CS Number',
    //         'CE Number',
    //         'RO Number',
    //         'Start Date',
    //         'End Date',
    //         'Price Repair',
    //         'REMARK',
    //         'Product code',
    //         'Product Image',
    //         'Status',


    //     );

    //     foreach ($products as $product) {
    //         $product_array[] = array(
    //             'Old ID' => $product->product_assetID,
    //             'New ID' => $product->product_newassetID,
    //             'Equipment' => $product->product_equip,
    //             'Valve Type' => $product->product_type,
    //             'End Connection' => $product->product_end,
    //             'Valve Size (Inch)' =>  $product->product_size,
    //             'Valve Rating' => $product->product_rating,
    //             'Valve Brand' => $product->product_brand,
    //             'Valve Model' => $product->product_valvemodel,
    //             'Serial Number' => $product->product_serial,
    //             'Valve Condition' => $product->product_condi,
    //             'Actuator Brand' => $product->product_actbrand,
    //             'Actuator Type' => $product->product_acttype,
    //             'Actuator Size' => $product->product_actsize,
    //             'Fail Position' =>  $product->product_fail,
    //             'Actuator Condition' => $product->product_actcond,
    //             'Positioner Brand' => $product->product_posbrand,
    //             'Positioner Model' => $product->product_posmodel,
    //             'Input Signal' => $product->product_inputsignal,
    //             'Positioner Condition' => $product->product_poscond,
    //             'Other Accessories' => $product->product_other,
    //             'Date In' => $product->product_datein,
    //             'Material Transfer' => $product->product_transfer,
    //             'Reservation Number' => $product->product_reser,
    //             'Ex Station' =>  $product->product_origin,
    //             'SDV In' => $product->product_sdvin,
    //             'SDV Out' => $product->product_sdvout,
    //             'Station' => $product->product_station,
    //             'Requestor' => $product->product_requestor,
    //             'Project' =>  $product->product_project,
    //             'Date Out' => $product->product_dateout,
    //             'Date to offshore' =>  $product->product_dateoffshore,
    //             'Material transfer to offshore' => $product->product_tfoffshore,
    //             'Current Location' => $product->product_curloc,
    //             'Stock In' => $product->product_stockin,
    //             'Dok Stok In' =>  $product->product_docin,
    //             'Stock Out' => $product->product_stockout,
    //             'Dok Stok Out' => $product->product_docout,
    //             'Stock Quality' => $product->product_stockqty,
    //             'UOM' => $product->product_uom,
    //             'TARGET PDN' => $product->product_targetpdn,
    //             'CS Release' => $product->product_csrelease,
    //             'CS Number' => $product->product_csnumber,
    //             'CE Number' => $product->product_cenumber,
    //             'RO Number' => $product->product_ronumber,
    //             'Start Date' => $product->product_startdate,
    //             'End Date' => $product->product_enddate,
    //             'Price Repair' => $product->product_price,
    //             'REMARK' => $product->product_remark,
    //             'Product Code' => $product->product_code,
    //             'Product Image' => $product->product_image,
    //             'Status' => $product->product_status,
    //         );
    //     }

    //     $this->exportExcel($product_array);
    // }

    /**
     *This function loads the customer data from the database then converts it
     * into an Array that will be exported to Excel
     */
    public function exportExcel($products)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');

        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($products);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="products.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    # show list of resource on datatable (index page) 
    public function showDatatable()
    {
        $model = CinaProduct::with('cinaProductOrigin')
        ->with('cinaAssetType')
        ->with('cinaProductLocation')
        ->select(
            'id',
            'old_id',
            'new_id',
            'equipment',
            'valve_type',
            'valve_size',
            'valve_rating',
            'brand',
            'valve_model',
            'valve_condition',
            'material_transfer',
            'station',
            'ex_station',
            'project',
            'in_date',
            'out_date',
            'cina_product_location_id',
            'target_pdn',
            'ce_number',
            'ro_number',
            'start_date',
            'end_date',
            'repair_price',
            'cina_product_origin_id',
            'cina_asset_type_id',
            // 'reservation_number',
            // 'sdv_in',
            // 'sdv_out',
            // 'requestor',
            // 'dt_out',
            // 'date_to_offshore',
            // 'material_transfer_to_offshore',
            // 'in_qty',
            // 'in_uom',
            // 'out_qty',
            // 'out_uom',
            // 'cs_release',
            // 'cs_number',
            // 'notes',
            // 'end_connection',
            // 'serial_number',
            // 'actuator_brand',
            // 'actuator_type',
            // 'actuator_size',
            // 'actuator_condition',
            // 'fail_position',
            // 'positioner_brand',
            // 'positioner_model',
            // 'positioner_condition',
            // 'input_signal',
            // 'other_accessories',
            // 'instrument_type',
            // 'bulk_material_type',
            // 'sparepart_description',
            // 'sparepart_number',
            // 'part_description',
        );

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '<a href="' . route('cina.products.show', [$model->id]) . '"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('cina.products.edit', ['product' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('cina.products.destroy', ['product' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' . $show . $edit . $delete . '</div>';

                return $actions;
            })
            ->editColumn('in_date', function($model) {
                return Carbon::parse($model->in_date)->format('d/m/Y');
            })
            ->editColumn('out_date', function($model) {
                return Carbon::parse($model->out_date)->format('d/m/Y');
            })
            ->editColumn('start_date', function($model) {
                return Carbon::parse($model->start_date)->format('d/m/Y');
            })
            ->editColumn('end_date', function($model) {
                return Carbon::parse($model->end_date)->format('d/m/Y');
            })
            ->editColumn('target_pdn', function($model) {
                return Carbon::parse($model->target_pdn)->format('d/m/Y');
            })
            ->editColumn('cina_product_origin_id', function($model) {
                return $model->cinaProductOrigin->title;
            })
            ->editColumn('cina_asset_type_id', function($model) {
                return $model->cinaAssetType->title;
            })
            ->editColumn('cina_asset_type_id', function($model) {
                return $model->cinaAssetType->title;
            })
            ->editColumn('cina_product_location_id', function($model) {
                return $model->cinaProductLocation->title;
            })
            ->editColumn('valve_size', function($model) {
                return $model->valve_size.' inch';
            })
            ->addColumn('tagnumber', function($model) {
                return !empty($model->new_id) ? $model->new_id : $model->old_id;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function formOriginTemplate($product)
    {
        $templateAlias = CinaProductOrigin::select('form_template')->find($product);

        return $templateAlias->form_template; 
    }

    public function formAssetTemplate($product)
    {
        $templateAlias = CinaAssetType::select('form_template')->find($product);

        return $templateAlias->form_template; 
    }

    public function dashboard()
    {
        $locationPTCS = CinaProductLocation::select('id')->where('title','PTCS')->first();

        $totalIncoming = CinaProduct::count();
        $totalAtWorkshop = CinaProduct::where('cina_product_location_id',$locationPTCS->id)->count();
        $totalOutgoing = CinaProduct::whereNot('out_date',null)->count();

        $assetTypes = CinaAssetType::select('id','title')->get();
        $assetOrigins = CinaProductOrigin::select('id','title')->orderBy('id')->get();

        $totalIncomingPerOriginByStatus = [];
        $totalAtWorkshopPerOriginByStatus = [];
        $totalOutgoingPerOriginByStatus = [];

        foreach ($assetOrigins as $origin) {
            $totalIncomingPerOriginByStatus[] = CinaProduct::where('cina_product_origin_id',$origin->id)->count();

            $totalAtWorkshopPerOriginByStatus[] = CinaProduct::where('cina_product_origin_id',$origin->id)
                ->where('cina_product_location_id',$locationPTCS->id)
                ->count();

            $totalOutgoingPerOriginByStatus[] = CinaProduct::where('cina_product_origin_id',$origin->id)
                ->whereNot('out_date',null)
                ->count();
        }

        $totalIncomingPerMonth = [];
        $totalAtworkshopPerMonth = [];
        $totalOutgoingPerMonth = [];

        for ($i=1; $i <= 12; $i++) { 
            $totalIncomingPerMonth[] = CinaProduct::whereRaw('MONTH(in_date) = '.$i.' AND YEAR(in_date) = YEAR(NOW())')->count();
            $totalAtworkshopPerMonth[] = CinaProduct::where('cina_product_location_id',$locationPTCS->id)->whereRaw('MONTH(in_date) = '.$i.' AND YEAR(in_date) = YEAR(NOW())')->count();
            $totalOutgoingPerMonth[] = CinaProduct::whereNot('out_date',null)->whereRaw('MONTH(out_date) = '.$i.' AND YEAR(out_date) = YEAR(NOW())')->count();
        }

        return view('customer_asset.products.dashboard', 
            compact(
                'totalIncoming',
                'totalAtWorkshop',
                'totalOutgoing',
                'assetTypes',
                'assetOrigins',
                'totalIncomingPerOriginByStatus',
                'totalAtWorkshopPerOriginByStatus',
                'totalOutgoingPerOriginByStatus',
                'totalIncomingPerMonth',
                'totalAtworkshopPerMonth',
                'totalOutgoingPerMonth',
            ));
    }
}
