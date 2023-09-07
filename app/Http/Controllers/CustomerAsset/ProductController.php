<?php

namespace App\Http\Controllers\CustomerAsset;

use App\Http\Controllers\Controller;
use App\Imports\SpareUnitValveImport;
use Exception;
use Illuminate\Support\Facades\Response;
use App\Models\CustomerAsset\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Picqer\Barcode\BarcodeGeneratorHTML;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Haruncpi\LaravelIdGenerator\IdGenerator;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

// use PDF;
// use Dompdf\Dompdf;
// use Dompdf\Options;
// use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Spare Unit - Valve';
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
    public function store(Request $request)
    {
        $product_code = IdGenerator::generate([
            'table' => 'products',
            'field' => 'product_code',
            'length' => 4,
            'prefix' => 'Vlv'
        ]);

        $rules = [
            'product_image' => 'image|file|max:2048',
            'product_status' => 'nullable|string',
            'product_assetID' => 'nullable|string',
            'product_newassetID' => 'nullable|string',
            'product_equip' => 'nullable|string',
            'product_type' => 'nullable|string',
            'product_end' => 'nullable|string',
            'product_size' => 'nullable|string',
            'product_rating' => 'nullable|string',
            'product_brand' => 'nullable|string',
            'product_valvemodel' => 'nullable|string',
            'product_serial' => 'nullable|string',
            'product_condi' => 'nullable|string',
            'product_actbrand' => 'nullable|string',
            'product_acttype' => 'nullable|string',
            'product_actsize' => 'nullable|string',
            'product_fail' => 'nullable|string',
            'product_actcond' => 'nullable|string',
            'product_posbrand' => 'nullable|string',
            'product_posmodel' => 'nullable|string',
            'product_inputsignal' => 'nullable|string',
            'product_poscond' => 'nullable|string',
            'product_other' => 'nullable|string',
            'product_datein' => 'nullable|date',
            'product_transfer' => 'nullable|string',
            'product_reser' => 'nullable|string',
            'product_origin' => 'nullable|string',
            'product_sdvin' => 'nullable|string',
            'product_sdvout' => 'nullable|string',
            'product_station' => 'nullable|string',
            'product_requestor' => 'nullable|string',
            'product_project' => 'nullable|string',
            'product_dateout' => 'nullable|date',
            'product_dateoffshore' => 'nullable|date',
            'product_tfoffshore' => 'nullable|string',
            'product_curloc' => 'nullable|string',
            'product_stockin' => 'nullable|integer',
            'product_docin' => 'mimes:doc,pdf|max:2048',
            'product_stockout' => 'nullable|integer',
            'product_docout' => 'mimes:doc,pdf|max:2048',
            'product_stockqty' => 'nullable|integer',
            'product_uom' => 'nullable|string',
            'product_targetpdn' => 'nullable|date',
            'product_csrelease' => 'nullable|string',
            'product_csnumber' => 'nullable|string',
            'product_cenumber' => 'nullable|string',
            'product_ronumber' => 'nullable|string',
            'product_startdate' => 'nullable|date',
            'product_enddate' => 'nullable|date',
            'product_price' => 'nullable|string',
            'product_remark' => 'nullable|string',
        ];

        $validatedData = $request->validate($rules);

        // Save product code value
        $validatedData['product_code'] = $product_code;

        /**
         * Handle upload image
         */
        if ($file = $request->file('product_image')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/products/';

            /**
             * Upload an image to Storage
             */
            $file->storeAs($path, $fileName);
            $fileName = 'storage/assets/img/products/' . $fileName;
            $validatedData['product_image'] = $fileName;
        }

        /**
         * Handle upload pdf docin
         */
        if ($file = $request->file('product_docin')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/assets/documents/products/';

            /**
             * Upload an docin to Storage
             */
            $file->storeAs($path, $fileName);
            $fileName = 'storage/assets/documents/products/' . $fileName;
            $validatedData['product_docin'] = $fileName;
        }

        /**
         * Handle upload pdf docout
         */
        if ($file = $request->file('product_docout')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/assets/documents/products/';

            /**
             * Upload an docout to Storage
             */
            $file->storeAs($path, $fileName);
            $fileName = 'storage/assets/documents/products/' . $fileName;
            $validatedData['product_docout'] = $fileName;
        }

        Product::create($validatedData);

        return Redirect::route('products.index')->with('success', 'Product has been created!');
    }

    public function show(Product $product)
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

    public function download($id)
    {
        $product = Product::findOrFail($id); // Ganti dengan model yang sesuai

        $pdf = PDF::loadView('products.show-pdf', compact('product')); // Ganti dengan view yang sesuai

        $filename = 'product_' . $id . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            // 'units' => Unit::all(),
            // 'ends' => End::all(),
            // 'sizes' => Size::all(),
            // 'ratings' => Rating::all(),
            // 'valvebrands' => Valvebrand::all(),
            // 'condis' => Condi::all(),
            // 'actbrands' => Actbrand::all(),
            // 'acttypes' => Acttype::all(),
            // 'actsizes' => Actsize::all(),
            // 'fails' => Fail::all(),
            // 'actconds' => Actcond::all(),
            // 'posbrands' => Posbrand::all(),
            // 'posmodels' => Posmodel::all(),
            // 'posconds' => Poscond::all(),
            // 'uoms' => Uom::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'product_image' => 'image|file|max:2048',
            'product_status' => 'nullable|string',
            'product_assetID' => 'nullable|string',
            'product_newassetID' => 'nullable|string',
            'product_equip' => 'nullable|string',
            'product_type' => 'nullable|string',
            'product_end' => 'nullable|string',
            'product_size' => 'nullable|string',
            'product_rating' => 'nullable|string',
            'product_brand' => 'nullable|string',
            'product_valvemodel' => 'nullable|string',
            'product_serial' => 'nullable|string',
            'product_condi' => 'nullable|string',
            'product_actbrand' => 'nullable|string',
            'product_acttype' => 'nullable|string',
            'product_actsize' => 'nullable|string',
            'product_fail' => 'nullable|string',
            'product_actcond' => 'nullable|string',
            'product_posbrand' => 'nullable|string',
            'product_posmodel' => 'nullable|string',
            'product_inputsignal' => 'nullable|string',
            'product_poscond' => 'nullable|string',
            'product_other' => 'nullable|string',
            'product_datein' => 'nullable|date',
            'product_transfer' => 'nullable|string',
            'product_reser' => 'nullable|string',
            'product_origin' => 'nullable|string',
            'product_sdvin' => 'nullable|string',
            'product_sdvout' => 'nullable|string',
            'product_station' => 'nullable|string',
            'product_requestor' => 'nullable|string',
            'product_project' => 'nullable|string',
            'product_dateout' => 'nullable|date',
            'product_dateoffshore' => 'nullable|date',
            'product_tfoffshore' => 'nullable|string',
            'product_curloc' => 'nullable|string',
            'product_stockin' => 'nullable|integer',
            'product_docin' => 'mimes:doc,pdf|max:2048',
            'product_stockout' => 'nullable|integer',
            'product_docout' => 'mimes:doc,pdf|max:2048',
            'product_stockqty' => 'nullable|integer',
            'product_uom' => 'nullable|string',
            'product_targetpdn' => 'nullable|date',
            'product_csrelease' => 'nullable|string',
            'product_csnumber' => 'nullable|string',
            'product_cenumber' => 'nullable|string',
            'product_ronumber' => 'nullable|string',
            'product_startdate' => 'nullable|date',
            'product_enddate' => 'nullable|date',
            'product_price' => 'nullable|string',
            'product_remark' => 'nullable|string',
        ];

        $validatedData = $request->validate($rules);

        /**
         * Handle upload an image
         */
        if ($file = $request->file('product_image')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/products/';

            /**
             * Delete photo if exists.
             */
            if ($product->product_image) {
                $result = str_replace('storage/', '', $product->product_image);
                Storage::delete('public/' . $result);
            }

            /**
             * Store an image to Storage
             */
            $file->storeAs($path, $fileName);
            $fileName = 'storage/assets/img/products/' . $fileName;
            $validatedData['product_image'] = $fileName;
        }

        /**
         * Handle upload an docin
         */
        if ($file = $request->file('product_docin')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/assets/documents/products/';

            /**
             * Delete docin if exists.
             */
            if ($product->product_docin) {
                $result = str_replace('storage/', '', $product->product_docin);
                Storage::delete('public/' . $result);
            }

            /**
             * Store an docin to Storage
             */
            $file->storeAs($path, $fileName);
            $fileName = 'storage/assets/documents/products/' . $fileName;
            $validatedData['product_docin'] = $fileName;
        }

        /**
         * Handle upload an docout
         */
        if ($file = $request->file('product_docout')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/assets/documents/products/';

            /**
             * Delete docout if exists.
             */
            if ($product->product_docout) {
                $result = str_replace('storage/', '', $product->product_docout);
                Storage::delete('public/' . $result);
            }

            /**
             * Store an docout to Storage
             */
            $file->storeAs($path, $fileName);
            $fileName = 'storage/assets/documents/products/' . $fileName;
            $validatedData['product_docout'] = $fileName;
        }



        Product::where('id', $product->id)->update($validatedData);

        return Redirect::route('products.index')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        /**
         * Delete photo if exists.
         */
        if ($product->product_image) {
            $result = str_replace('storage/', '', $product->product_image);
            Storage::delete('public/' . $result);
        }

        /**
         * Delete docin if exists.
         */
        if ($product->product_docin) {
            $result = str_replace('storage/', '', $product->product_docin);
            Storage::delete('public/' . $result);
        }

        /**
         * Delete docout if exists.
         */
        if ($product->product_docout) {
            $result = str_replace('storage/', '', $product->product_docout);
            Storage::delete('public/' . $result);
        }

        Product::destroy($product->id);

        return Redirect::route('products.index')->with('success', 'Product has been deleted!');
    }

    /**
     * Handle export data products.
     */
    public function import(Request $request)
    {
        $file = $request->file('filexls');

        try {
            Excel::import(new SpareUnitValveImport(), $file);

            return response()->json([
                'message' => 'File uploaded'
            ], 200);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());

            return response()->json([
                'message' => $ex->getMessage()
            ],500);
        }
    }

    public function handleImport(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx',
        ]);

        $the_file = $request->file('file');

        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range(2, $row_limit);
            $column_range = range('BB', $column_limit);
            $startcount = 2;
            $data = array();
            foreach ($row_range as $row) {
                $data[] = [
                    'product_assetID' => $sheet->getCell('A' . $row)->getValue(),
                    'product_newassetID' => $sheet->getCell('B' . $row)->getValue(),
                    'product_equip' => $sheet->getCell('C' . $row)->getValue(),
                    'product_type' => $sheet->getCell('D' . $row)->getValue(),
                    'product_end' => $sheet->getCell('E' . $row)->getValue(),
                    'product_size' => $sheet->getCell('F' . $row)->getValue(),
                    'product_rating' => $sheet->getCell('G' . $row)->getValue(),
                    'product_brand' => $sheet->getCell('H' . $row)->getValue(),
                    'product_valvemodel' => $sheet->getCell('I' . $row)->getValue(),
                    'product_serial' => $sheet->getCell('J' . $row)->getValue(),
                    'product_condi' => $sheet->getCell('K' . $row)->getValue(),
                    'product_actbrand' => $sheet->getCell('L' . $row)->getValue(),
                    'product_acttype' => $sheet->getCell('M' . $row)->getValue(),
                    'product_actsize' => $sheet->getCell('N' . $row)->getValue(),
                    'product_fail' => $sheet->getCell('O' . $row)->getValue(),
                    'product_actcond' => $sheet->getCell('P' . $row)->getValue(),
                    'product_posbrand' => $sheet->getCell('Q' . $row)->getValue(),
                    'product_posmodel' => $sheet->getCell('R' . $row)->getValue(),
                    'product_inputsignal' => $sheet->getCell('S' . $row)->getValue(),
                    'product_poscond' => $sheet->getCell('T' . $row)->getValue(),
                    'product_other' => $sheet->getCell('U' . $row)->getValue(),
                    'product_datein' => $sheet->getCell('V' . $row)->getValue(),
                    'product_transfer' => $sheet->getCell('W' . $row)->getValue(),
                    'product_reser' => $sheet->getCell('X' . $row)->getValue(),
                    'product_origin' => $sheet->getCell('Y' . $row)->getValue(),
                    'product_sdvin' => $sheet->getCell('Z' . $row)->getValue(),
                    'product_sdvout' => $sheet->getCell('AA' . $row)->getValue(),
                    'product_station' => $sheet->getCell('AB' . $row)->getValue(),
                    'product_requestor' => $sheet->getCell('AC' . $row)->getValue(),
                    'product_project' => $sheet->getCell('AD' . $row)->getValue(),
                    'product_dateout' => $sheet->getCell('AE' . $row)->getValue(),
                    'product_dateoffshore' => $sheet->getCell('AF' . $row)->getValue(),
                    'product_tfoffshore' => $sheet->getCell('AG' . $row)->getValue(),
                    'product_curloc' => $sheet->getCell('AH' . $row)->getValue(),
                    'product_stockin' => $sheet->getCell('AI' . $row)->getValue(),
                    'product_docin' => $sheet->getCell('AJ' . $row)->getValue(),
                    'product_stockout' => $sheet->getCell('AK' . $row)->getValue(),
                    'product_docout' => $sheet->getCell('AL' . $row)->getValue(),
                    'product_stockqty' => $sheet->getCell('AM' . $row)->getValue(),
                    'product_uom' => $sheet->getCell('AN' . $row)->getValue(),
                    'product_targetpdn' => $sheet->getCell('AO' . $row)->getValue(),
                    'product_csrelease' => $sheet->getCell('AP' . $row)->getValue(),
                    'product_csnumber' => $sheet->getCell('AQ' . $row)->getValue(),
                    'product_cenumber' => $sheet->getCell('AR' . $row)->getValue(),
                    'product_ronumber' => $sheet->getCell('AS' . $row)->getValue(),
                    'product_startdate' => $sheet->getCell('AT' . $row)->getValue(),
                    'product_enddate' => $sheet->getCell('AU' . $row)->getValue(),
                    'product_price' => $sheet->getCell('AV' . $row)->getValue(),
                    'product_remark' => $sheet->getCell('AW' . $row)->getValue(),
                    'product_code' => $sheet->getCell('AX' . $row)->getValue(),
                    'product_image' => $sheet->getCell('AY' . $row)->getValue(),
                    'product_status' => $sheet->getCell('AZ' . $row)->getValue(),


                ];
                $startcount++;
            }
            // dd($data); cara liat eror
            Product::insert($data);
        } catch (Exception $e) {
            // $error_code = $e->getMessage(); cara liat eror
            return Redirect::route('products.index')->with('error', 'There was a problem uploading the data!');
        }
        return Redirect::route('products.index')->with('success', 'Data product has been imported!');
    }

    /**
     * Handle export data products.
     */
    function export()
    {
        $products = Product::all()->sortBy('product_type');

        $product_array[] = array(
            'Old ID',
            'New ID',
            'Equipment',
            'Valve Type',
            'End Connection',
            'Valve Size (Inch)',
            'Valve Rating',
            'Valve Brand',
            'Valve Model',
            'Serial Number',
            'Valve Condition',
            'Actuator Brand',
            'Actuator Type',
            'Actuator Size',
            'Fail Position',
            'Actuator Condition',
            'Positioner Brand',
            'Positioner Model',
            'Input Signal',
            'Positioner Condition',
            'Other Accessories',
            'Date In',
            'Material Transfer',
            'Reservation Number',
            'Ex Station',
            'SDV In',
            'SDV Out',
            'Station',
            'Requestor',
            'Project',
            'Date Out',
            'Date to offshore',
            'Material transfer to offshore',
            'Current Location',
            'Stock In',
            'Dok Stok In',
            'Stock Out',
            'Dok Stok Out',
            'Stock Quality',
            'UOM',
            'TARGET PDN',
            'CS Release',
            'CS Number',
            'CE Number',
            'RO Number',
            'Start Date',
            'End Date',
            'Price Repair',
            'REMARK',
            'Product code',
            'Product Image',
            'Status',


        );

        foreach ($products as $product) {
            $product_array[] = array(
                'Old ID' => $product->product_assetID,
                'New ID' => $product->product_newassetID,
                'Equipment' => $product->product_equip,
                'Valve Type' => $product->product_type,
                'End Connection' => $product->product_end,
                'Valve Size (Inch)' =>  $product->product_size,
                'Valve Rating' => $product->product_rating,
                'Valve Brand' => $product->product_brand,
                'Valve Model' => $product->product_valvemodel,
                'Serial Number' => $product->product_serial,
                'Valve Condition' => $product->product_condi,
                'Actuator Brand' => $product->product_actbrand,
                'Actuator Type' => $product->product_acttype,
                'Actuator Size' => $product->product_actsize,
                'Fail Position' =>  $product->product_fail,
                'Actuator Condition' => $product->product_actcond,
                'Positioner Brand' => $product->product_posbrand,
                'Positioner Model' => $product->product_posmodel,
                'Input Signal' => $product->product_inputsignal,
                'Positioner Condition' => $product->product_poscond,
                'Other Accessories' => $product->product_other,
                'Date In' => $product->product_datein,
                'Material Transfer' => $product->product_transfer,
                'Reservation Number' => $product->product_reser,
                'Ex Station' =>  $product->product_origin,
                'SDV In' => $product->product_sdvin,
                'SDV Out' => $product->product_sdvout,
                'Station' => $product->product_station,
                'Requestor' => $product->product_requestor,
                'Project' =>  $product->product_project,
                'Date Out' => $product->product_dateout,
                'Date to offshore' =>  $product->product_dateoffshore,
                'Material transfer to offshore' => $product->product_tfoffshore,
                'Current Location' => $product->product_curloc,
                'Stock In' => $product->product_stockin,
                'Dok Stok In' =>  $product->product_docin,
                'Stock Out' => $product->product_stockout,
                'Dok Stok Out' => $product->product_docout,
                'Stock Quality' => $product->product_stockqty,
                'UOM' => $product->product_uom,
                'TARGET PDN' => $product->product_targetpdn,
                'CS Release' => $product->product_csrelease,
                'CS Number' => $product->product_csnumber,
                'CE Number' => $product->product_cenumber,
                'RO Number' => $product->product_ronumber,
                'Start Date' => $product->product_startdate,
                'End Date' => $product->product_enddate,
                'Price Repair' => $product->product_price,
                'REMARK' => $product->product_remark,
                'Product Code' => $product->product_code,
                'Product Image' => $product->product_image,
                'Status' => $product->product_status,
            );
        }

        $this->exportExcel($product_array);
    }

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
        $model = Product::select(
            'id',
            'product_status',
            'product_newassetID',
            'product_type',
            'product_size',
            'product_rating',
            'product_brand',
            'product_valvemodel',
            'product_stockin',
            'product_docin',
            'product_stockout',
            'product_docout',
            'product_stockqty',
            'product_cenumber',
            'product_ronumber',
        );

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '<a href="' . route('products.show', [$model->id]) . '"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('products.edit', ['product' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('products.destroy', ['product' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' . $show . $edit . $delete . '</div>';

                return $actions;
            })
            ->editColumn('product_status', function ($model) {
                return $model->product_status ? $model->status : '<span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">Unknown</span>';
            })
            ->rawColumns(['actions','product_status','product_docout'])
            ->make(true);
    }
}
