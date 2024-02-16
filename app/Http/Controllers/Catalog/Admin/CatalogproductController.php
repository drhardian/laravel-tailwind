<?php

namespace App\Http\Controllers\Catalog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Catalogcodeitem;
use Illuminate\Http\Request;
use App\Models\Catalog\Catalogproduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CatalogproductImport;
// use App\Exports\PsvdatamasterExport;


class CatalogproductController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Catalog Products';
        $this->pageProfile = 'Catalog Products';
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

        return view('catalogs.admin.catalogproducts.index', [
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
            $catalogCode = Catalogcodeitem::select(
                'main_code',
                'code',
                'sub_code',
                'group_code',
            )->where([
                ['titlemain_code','=',$request->productmain_code],
                ['title_code','=',$request->product_code],
                ['titlesub_code','=',$request->productsub_code],
                ['titlegroup_code','=',$request->productgroup_code],
            ])->first();

            // dd([$request->productmain_code,$request->product_code,$request->productsub_code,$request->productgroup_code]);

            $getLastItemTotal = Catalogproduct::where([
                ['productmain_code','=',$request->productmain_code],
                ['product_code','=',$request->product_code],
                ['productsub_code','=',$request->productsub_code],
                ['productgroup_code','=',$request->productgroup_code],
            ])->count();

            $itemcode = $catalogCode->main_code.$catalogCode->code.$catalogCode->sub_code.$catalogCode->group_code.(intval($getLastItemTotal)+1);

            /**
             * Handle upload image
             */
            if ($file = $request->file('product_image')) {
                // $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $fileName = $itemcode . '.' . $file->getClientOriginalExtension();
                $path = 'public/assets/img/catalogproducts';
                /**
                 * Upload an image to Storage
                 */
                $file->storeAs($path, $fileName);
                // $fileName = 'storage/assets/img/catalogproducts/' . $fileName;
                // $validatedData['product_image'] = $fileName;
            }

            $catalogproduct = Catalogproduct::create(
                array_merge(
                    [
                        'product_image' => 'catalogproducts/'.$fileName,
                        'itemcode' => $itemcode
                    ],
                    $request->only('productmain_code', 'product_code', 'productsub_code', 'productgroup_code', 'product_name', 'product_spec', 'product_brand', 'product_minstock', 'product_uom', 'product_price')
                )
            );

            DB::commit();

            return response()->json([
                'message' => 'Catalogproduct has been created!'
            ], 200);

            // return response()->json([
            //     'url' => route('catalogproduct.show', [$catalogproduct->id])
            // ], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();

            return response()->json([
                'error' => 'error'
            ], 500);
        }



        // Catalogproduct::create($validatedData);

        // return redirect()->back()->with('success', 'Catalogproduct has been created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Catalogproduct $catalogproduct)
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
                'url' => route('admin.catalogproduct.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('catalogs.admin.catalogproducts.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'catalogproduct' => $catalogproduct
        ]);
    }

    // //PRINT PDF

    // public function cetakPdf($id)
    // {
    //     // Ambil data yang akan dicetak
    //     $psvdatamaster = Psvdatamaster::findOrFail($id);
    //     // \Log::debug($psvdatamaster);


    //     // Cetak PDF dari tampilan (view) 'pdf.view' dengan data yang diambil
    //     $pdf = PDF::loadView('customerasset_psv.psvdatamaster.pdfview', compact('psvdatamaster'));

    //     // Opsional: Atur ukuran dan orientasi halaman PDF
    //     $pdf->setPaper('A4', 'portrait');

    //     // Opsional: Download PDF dengan nama yang sesuai
    //     return $pdf->download('psvdatamaster.pdf');

    //     // Tampilkan PDF dalam browser
    //     return $pdf->stream('psvdatamaster.pdf');

    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalogproduct $catalogproduct)
    {
        return response()->json([
            'dropdown' => [
                'productmain_code' => $catalogproduct->productmain_code,
                'product_code' => $catalogproduct->product_code,
                'productsub_code' => $catalogproduct->productsub_code,
                'productgroup_code' => $catalogproduct->productgroup_code,
                'product_uom' => $catalogproduct->product_uom,
                'product_name' => $catalogproduct->product_name,

            ],
            'form' => [
                ['product_minstock', $catalogproduct->product_minstock],
                // ['product_descrip', $catalogproduct->product_descrip],
                ['product_spec', $catalogproduct->product_spec],
                ['product_brand', $catalogproduct->product_brand],
                ['product_price', $catalogproduct->product_price],
            ],
            'update_url' => route('admin.catalogproduct.update', ['catalogproduct' => $catalogproduct->id]),
            'product_image' => '<img src="'.asset($catalogproduct->product_image).'" width="20%">'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalogproduct $catalogproduct)
    {
        DB::beginTransaction();

        try {
            if(!empty($request->file('product_image'))) {
                /**
                 * Handle upload an image
                 */
                if ($file = $request->file('product_image')) {
                    $fileName = $catalogproduct->itemcode . '.' . $file->getClientOriginalExtension();
                    $path = 'public/assets/img/catalogproducts';
                    /**
                     * Upload an image to Storage
                     */
                    $file->storeAs($path, $fileName);
                }

                $queryUpdate = array_merge(
                    [ 'product_image' => 'catalogproducts/'.$fileName, ],
                    $request->only('product_name', 'product_spec', 'product_brand', 'product_minstock', 'product_uom', 'product_price')
                );
            } else {
                $queryUpdate = $request->only('product_name', 'product_spec', 'product_brand', 'product_minstock', 'product_uom', 'product_price');
            }
            
            // $queryUpdate = $request->only('product_name', 'product_spec', 'product_brand', 'product_minstock', 'product_uom', 'product_price');
            // dd($fileName);

            $catalogproduct->update($queryUpdate);
            
            DB::commit();

            return response()->json([
                'message' => 'catalogproduct successfully updated'
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
     * Handle upload an cert_doc
     */
    // \Log::debug($request);
    // if ($file = $request->file('cert_doc')) {
    //     $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
    //     $path = 'public/assets/documents/psv/';

    //     /**
    //      * Delete cert_doc if exists.
    //      */
    //     if($psvdatamaster->cert_doc){
    //         $result = str_replace('storage/', '', $psvdatamaster->cert_doc);
    //         Storage::delete('public/' . $result);
    //     }

    //     /**
    //      * Store an cert_doc to Storage
    //      */
    //     $file->storeAs($path, $fileName);
    //     $fileName = 'storage/assets/documents/psv/'.$fileName;
    //     $validatedData['cert_doc'] = $fileName;
    // }

    //     Psvdatamaster::where('id', $psvdatamaster->id)->update($validatedData);
    // //     return response()->json([
    //         'message' => 'psvdatamaster successfully updated'
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
    public function destroy(Catalogproduct $catalogproduct)
    {
        DB::beginTransaction();

        try {
            /**
         * Delete photo if exists.
         */
        if($catalogproduct->product_image){
            $result = str_replace('storage/', '', $catalogproduct->product_image);
                Storage::delete('public/' . $result);
        }
            Catalogproduct::destroy($catalogproduct->id);

            DB::commit();

            return response()->json([
                'message' => 'catalogproduct successfully deleted'
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
        // if($psvdatamaster->cert_doc){
        //     $result = str_replace('storage/', '', $psvdatamaster->cert_doc);
        //         Storage::delete('public/' . $result);
        // }

    }

    // public function uploadCertDoc(Request $request)
    // {
    //     $request->validate([
    //         'cert_doc' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     if ($request->hasFile('cert_doc')) {
    //         $file = $request->file('cert_doc');
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('cert_docs', $fileName); // Simpan file di direktori 'cert_docs'

    //         // Simpan informasi dokumen ke tabel 'cert_doc'
    //         $certDoc = new CertDoc();
    //         $certDoc->name = $fileName;
    //         $certDoc->file_path = $filePath;
    //         $certDoc->save();

    //         return redirect()->back()->with('success', 'Certificate document uploaded successfully.');
    //     }

    //     return redirect()->back()->with('error', 'Failed to upload certificate document.');
    // }

    /**
     * EXPORT EXCEL 
     */
    // public function exportExcel()
    // {
    //     return Excel::download(new PsvdatamasterExport, 'psvdatamaster_data.xlsx');
    //     // return redirect()->back()->with('success', 'Data exported successfully');

    // }

    /**
     * IMPORT EXCEL 
     */
    public function importExcel(Request $request)
    {
        try {
            Excel::import(new CatalogproductImport, $request->file('filexls'));

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
        $model = Catalogproduct::select(
            'id',
            'itemcode',
            'product_image',
            'productmain_code',
            'product_code',
            'productsub_code',
            'productgroup_code',
            'product_name',
            // 'product_merk',
            // 'product_descrip',
            // 'product_minstock',
            'product_spec',
            'product_brand',
            'product_uom',
            'product_price',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '<a href="' . route('admin.catalogproduct.show', [$model->id]) . '"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('admin.catalogproduct.edit', ['catalogproduct' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('admin.catalogproduct.destroy', ['catalogproduct' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('product_image', function ($model) {
                return '<img src="'.asset('').$model->product_image.'">';
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions','product_image'])
            ->removeColumn('catalogproducts')
            ->make(true);
    }
}
