<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Catalogproduct;
use Illuminate\Http\Request;
use App\Models\Inventory\Prodin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProdinImport;
use App\Exports\PsvdatamasterExport;

class ProdinController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Stock Product In';
        $this->pageProfile = 'Stock Product In';
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

        return view('inventory.prodin.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
             /**
             * Handle upload image
             */
            // if ($file = $request->file('prodin_image')) {
            //     $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            //     $path = 'public/assets/img/invproductin';
            //     /**
            //      * Upload an image to Storage
            //      */
            //     $file->storeAs($path, $fileName);
            //     $fileName = 'storage/assets/img/invproductin/' . $fileName;
            //     $validatedData['prodin_image'] = $fileName;
            // }
            
            $prodin = Prodin::create(
                array_merge(
                    [
                        // 'prodin_image' => $fileName,
                        'prodin_datein' => Carbon::createFromFormat('d/m/Y', $request->prodin_datein)->format('Y-m-d'),
                    ],
                $request->only('catalog_product_id','prodin_actual','prodin_origin','prodin_budgetorigin','prodin_noref','prodin_stockin','prodin_owner','prodin_supplier', 'prodin_stockloc','prodin_detailloc')
                )
            ); 
            
            DB::commit();

            return response()->json([
                'message' => 'Product In has been created!'
            ], 200);

            // return response()->json([
            //     'url' => route('eprocfbo.show', [$eprocfbo->id])
            // ], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();

            return response()->json([
                'error' => 'error'
            ], 500);
        }

        // Psvdatamaster::create($validatedData);

        // return redirect()->back()->with('success', 'Psvdatamaster has been created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Prodin $prodin)
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
                'status' => 'active',
                'url' => route('inventory.prodin.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        $prodin = $prodin->load('catalogProduct');

        return view('inventory.prodin.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'prodin' => $prodin
        ]);
    }

    //PRINT PDF

    // public function cetakPdf($id)
    // {
    //     // Ambil data yang akan dicetak
    //     $eprocfbo = Eprocfbo::findOrFail($id);
    //     // \Log::debug($Eprocfbo);

    
    //     // Cetak PDF dari tampilan (view) 'pdf.view' dengan data yang diambil
    //     $pdf = PDF::loadView('eproc.eprocfbo.pdfview', compact('eprocfbo'));
    
    //     // Opsional: Atur ukuran dan orientasi halaman PDF
    //     $pdf->setPaper('A4', 'portrait');
    
    //     // Opsional: Download PDF dengan nama yang sesuai
    //     return $pdf->download('eprocfbo.pdf');
    
    //     // Tampilkan PDF dalam browser
    //     return $pdf->stream('eprocfbo.pdf');

    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function loadprofilefromitemcode()
    // {
    //     $catalogProduct = Catalogproduct::where('itemcode',request('itemcode'))->first();
    //     // dd($catalogProduct);
    //     $imgUrl = asset('').$catalogProduct->product_image;

    //     return response()->json([
    //         // 'prodin_image' => $catalogProduct->product_image,
    //         'prod_name' => $catalogProduct->product_name,
    //         'inv_brand' => $catalogProduct->product_brand,
    //         'inv_category' => $catalogProduct->productgroup_code,
    //         'inv_uom' => $catalogProduct->product_uom,
    //         'inv_spec' => $catalogProduct->product_spec,
    //         'inv_price' => $catalogProduct->product_price,
    //         'prodin_image' => '<img class="img-account-profile mb-3 mx-auto" src="'.$imgUrl.'" id="image-preview" style="max-width: 10%;" />'
    //     ], 200);
    // }
    
    public function loadprofilefromproductname(Catalogproduct $catalogProduct)
    {
        // $catalogProduct = Catalogproduct::where('product_name','like','%'.request('product_name').'%')->first();
        // $catalogProduct = Catalogproduct::find(request('id'));
        $imgUrl = asset('').$catalogProduct->product_image;

        return response()->json([
            // 'prodin_image' => $catalogProduct->product_image,
            'prod_code' => $catalogProduct->itemcode,
            'inv_brand' => $catalogProduct->product_brand,
            'inv_category' => $catalogProduct->productgroup_code,
            'inv_uom' => $catalogProduct->product_uom,
            'inv_spec' => $catalogProduct->product_spec,
            'inv_price' => $catalogProduct->product_price,
            'prodin_image' => '<img class="img-account-profile mb-3 mx-auto" src="'.$imgUrl.'" id="image-preview" style="max-width: 10%;" />'
        ], 200);
    }

    public function edit(Prodin $prodin)
    {
        return response()->json([
            'dropdown' => [
                'catalog_product_id' => $prodin->catalog_product_id,
                'prodin_origin' => $prodin->prodin_origin,
                'prodin_budgetorigin' => $prodin->prodin_budgetorigin,
                'prodin_stockloc' => $prodin->prodin_stockloc,
                'prodin_owner' => $prodin->prodin_owner,
            ],
            'form' => [
                ['prodin_actual', $prodin->prodin_actual],
                ['prodin_noref', $prodin->prodin_noref],
                ['prodin_datein', Carbon::parse($prodin->prodin_datein)->format('d/m/Y')],
                ['prodin_owner', $prodin->prodin_owner],
                ['prodin_supplier', $prodin->prodin_supplier],
                ['prodin_stockin', $prodin->prodin_stockin],
                ['prodin_stockloc', $prodin->prodin_stockloc],
                ['prodin_detailloc', $prodin->prodin_detailloc],
            ],
            'update_url' => route('inventory.prodin.update', ['prodin' => $prodin->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodin $prodin)
    {
        DB::beginTransaction();

        try {

            // if ($file = $request->file('prodin_image')) {
            //     $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            //     $path = 'public/assets/img/invproductin/';
    
            //     /**
            //      * Delete photo if exists.
            //      */
            //     if($prodin->prodin_image){
            //         $result = str_replace('storage/', '', $prodin->prodin_image);
            //         Storage::delete('public/' . $result);
            //     }
    
            //     /**
            //      * Store an image to Storage
            //      */
            //     $file->storeAs($path, $fileName);
            //     $fileName = 'storage/assets/img/invproductin/'.$fileName;
            //     $validatedData['prodin_image'] = $fileName;
            // }
            Prodin::where('id', $prodin->id)->update(
                array_merge(
                [
                    // 'prodin_image' => $fileName
                    'prodin_datein' => Carbon::createFromFormat('d/m/Y', $request->prodin_datein)->format('Y-m-d'),

                ],
            $request->only('catalog_product_id', 'prodin_actual', 'prodin_origin', 'prodin_budgetorigin', 'prodin_noref', 'prodin_stockin', 'prodin_owner', 'prodin_supplier', 'prodin_stockloc', 'prodin_detailloc')
            )
        ); 

        DB::commit();

        return response()->json([
            'message' => 'Product In successfully updated'
        ], 200);

    } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

         /**
         * Handle upload an upload_srf
         */
        // \Log::debug($request);
        // if ($file = $request->file('upload_srf')) {
        //     $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        //     $path = 'public/assets/documents/psv/';

        //     /**
        //      * Delete upload_srf if exists.
        //      */
        //     if($eprocfbo->upload_srf){
        //         $result = str_replace('storage/', '', $eprocfbo->upload_srf);
        //         Storage::delete('public/' . $result);
        //     }

        //     /**
        //      * Store an upload_srf to Storage
        //      */
        //     $file->storeAs($path, $fileName);
        //     $fileName = 'storage/assets/documents/psv/'.$fileName;
        //     $validatedData['upload_srf'] = $fileName;
        // }

    //     eprocfbo::where('id', $eprocfbo->id)->update($validatedData);
    // //     return response()->json([
    //         'message' => 'eprocfbo successfully updated'
    //     ], 200);
    // } catch (\Exception $e) {
    //     DB::rollBack();
    //     Log::error($e->getMessage());

    //     return response()->json([
    //         'message' => 'The server encountered an error and could not complete your request'
    //     ], 500);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodin $prodin)
    {
        DB::beginTransaction();

        try {
            if($prodin->prodin_image){
                $result = str_replace('storage/', '', $prodin->prodin_image);
                    Storage::delete('public/' . $result);
            }

            Prodin::destroy($prodin->id);

            DB::commit();

            return response()->json([
                'message' => 'Product In successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
        /**
         * Delete cer_doc if exists.
         */
        // if($psvdatamaster->upload_srf){
        //     $result = str_replace('storage/', '', $psvdatamaster->upload_srf);
        //         Storage::delete('public/' . $result);
        // }

    }

    // public function uploadSrf(Request $request)
    // {
    //     $request->validate([
    //         'upload_srf' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     if ($request->hasFile('upload_srf')) {
    //         $file = $request->file('upload_srf');
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('upload_srfs', $fileName); // Simpan file di direktori 'upload_srfs'

    //         // Simpan informasi dokumen ke tabel 'upload_srf'
    //         $uploadSrf = new UploadSrf();
    //         $uploadSrf->name = $fileName;
    //         $uploadSrf->file_path = $filePath;
    //         $uploadSrf->save();

    //         return redirect()->back()->with('success', 'Certificate document uploaded successfully.');
    //     }

    //     return redirect()->back()->with('error', 'Failed to upload certificate document.');
    // }

     /**
     * EXPORT EXCEL 
     */
    // public function exportExcel()
    // {
    //     return Excel::download(new CatalogproductExport, 'catalogproduct_data.xlsx');
    //     // return redirect()->back()->with('success', 'Data exported successfully');

    // }

    // //  /**
    // //  * IMPORT EXCEL 
    // //  */
    public function importExcel(Request $request)
    {
        try {
            Excel::import(new ProdinImport, $request->file('filexls'));

            return response()->json([
                'message' => 'Data imported successfully'
            ], 200);
        } catch (ParseError $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function showDatatable()
    {
        $model = Prodin::with('catalogProduct')->select(
            'id',
            'catalog_product_id',
            'prodin_stockin',
            'prodin_datein',
            'prodin_owner',
            'updated_at'
        );

        // dd($model);

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('prodin.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('prodin.edit', ['prodin' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('prodin.destroy', ['prodin' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('prodin_image', function($model) {
                return !empty($model->catalogProduct->product_image) ? '<img src="'. asset('').$model->catalogProduct->product_image.'">' : '';
            })
            ->rawColumns(['actions','prodin_image'])
            ->removeColumn('prodins')
            ->make(true);
    }

}
