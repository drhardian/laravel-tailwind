<?php

namespace App\Http\Controllers\Eproc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eproc\Eprocproduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class EprocproductController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'e-Proc Products';
        $this->pageProfile = 'e-Proc Products';
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

        return view('eproc.eprocproduct.index', [
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
            $eprocproduct = Eprocproduct::create(
                $request->only('productmain_code', 'product_code', 'productsub_code','productgroup_code', 'descrip_eproc', 'qty_eproc', 'brand_eproc', 'uom_eproc', 'price_eproc')
            );
            
            DB::commit();

            return response()->json([
                'message' => 'Eprocproduct has been created!'
            ], 200);

            // return response()->json([
            //     'url' => route('eprocproduct.show', [$eprocproduct->id])
            // ], 200);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();

            return response()->json([
                'error' => 'error'
            ], 500);
        }

        

        // Eprocproduct::create($validatedData);

        // return redirect()->back()->with('success', 'Eprocproduct has been created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Eprocproduct $eprocproduct)
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
                'url' => route('eprocproduct.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('eproc.eprocproduct.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'eprocproduct' => $eprocproduct
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
    public function edit(Eprocproduct $eprocproduct)
    {
        return response()->json([
            'dropdown' => [
                'productmain_code' => $eprocproduct->productmain_code,
                'product_code' => $eprocproduct->product_code,
                'productsub_code' => $eprocproduct->productsub_code,
                'productgroup_code'=> $eprocproduct->productgroup_code,
                
            ],
            'form' => [
               ['descrip_eproc', $eprocproduct->descrip_eproc], 
               ['qty_eproc', $eprocproduct->qty_eproc], 
               ['brand_eproc', $eprocproduct->brand_eproc], 
               ['uom_eproc', $eprocproduct->uom_eproc], 
               ['price_eproc', $eprocproduct->price_eproc],
            ],

            'update_url' => route('eprocproduct.update', ['eprocproduct' => $eprocproduct->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eprocproduct $eprocproduct)
    {
        DB::beginTransaction();

        try {

            // if ($file = $request->file('cert_doc')) {
            //     $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            //     $path = 'public/assets/documents/psv/';
    
            //     /**
            //      * Delete docin if exists.
            //      */
            //     if($psvdatamaster->cert_doc){
            //         $result = str_replace('storage/', '', $psvdatamaster->cert_doc);
            //         Storage::delete('public/' . $result);
            //     }
    
            //     /**
            //      * Store an docin to Storage
            //      */
            //     $file->storeAs($path, $fileName);
            //     $fileName = 'storage/assets/documents/products/'.$fileName;
            //     // $validatedData['cert_doc'] = $fileName;
            // }
        
            Eprocproduct::where('id', $eprocproduct->id)->update(
            $request->only('productmain_code', 'product_code', 'productsub_code','productgroup_code', 'descrip_eproc', 'qty_eproc', 'brand_eproc', 'uom_eproc', 'price_eproc')
            
        ); 

            DB::commit();

            return response()->json([
                'message' => 'eprocproduct successfully updated'
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
    public function destroy(Eprocproduct $eprocproduct)
    {
        DB::beginTransaction();

        try {
            // if($eprocproduct->cert_doc){
            //     $result = str_replace('storage/', '', $eprocproduct->cert_doc);
            //         Storage::delete('public/' . $result);
            // }

            Eprocproduct::destroy($eprocproduct->id);

            DB::commit();

            return response()->json([
                'message' => 'eprocproduct successfully deleted'
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
    // public function importExcel(Request $request)
    // {
    //     try {
    //         Excel::import(new PsvdatamasterImport, $request->file('filexls'));

    //         return response()->json([
    //             'message' => 'Data imported successfully'
    //         ], 200);
    //     } catch (ParseError $e) {
    //         return response()->json([
    //             'message' => $e->getMessage()
    //         ], 500);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }

    // }

    public function showDatatable()
    {
        $model = Eprocproduct::select(
            'id',
            'productmain_code', 
            'product_code', 
            'productsub_code',
            'productgroup_code', 
            'descrip_eproc', 
            'qty_eproc', 
            'brand_eproc', 
            'uom_eproc', 
            'price_eproc',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('eprocproduct.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('eprocproduct.edit', ['eprocproduct' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('eprocproduct.destroy', ['eprocproduct' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('eprocproducts')
            ->make(true);
    }
}
