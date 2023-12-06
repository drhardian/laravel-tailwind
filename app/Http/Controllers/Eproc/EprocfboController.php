<?php

namespace App\Http\Controllers\Eproc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eproc\Eprocfbo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Eproc\UploadSrf;


class EprocfboController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'FBO';
        $this->pageProfile = 'FBO';
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

        return view('eproc.eprocfbo.index', [
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
            // /**
            //  * Handle upload pdf upload_srf
            //  */
            $file = $request->file('upload_srf');
                $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $path = 'public/assets/documents/psv/'; 

            //     /**
            //      * Upload an upload_srf to Storage
            //      */
                $file->storeAs($path, $fileName);
                $fileName = 'storage/assets/documents/psv/'.$fileName;
                // $validatedData['upload_srf'] = $fileName;
            

            $eprocfbo = Eprocfbo::create(array_merge(
                [
                'upload_srf'=>$fileName
                ],
                $request->only('required_by','division','request_date','due_date','type_process','upload_srf','tkdn_required','minimum','required_category','eprocmethod','statusfbo')
                )
            ); 
            
            DB::commit();

            return response()->json([
                'message' => 'FBO has been created!'
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
    public function show(Eprocfbo $eprocfbo)
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
                'url' => route('eprocfbo.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('eproc.eprocfbo.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'eprocfbo' => $eprocfbo
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
    public function edit(Eprocfbo $eprocfbo)
    {
        return response()->json([
            'dropdown' => [
                'type_process' => $eprocfbo->type_process,
                'tkdn_required' => $eprocfbo->tkdn_required,
                'required_category' => $eprocfbo->required_category,
                'eprocmethod' => $eprocfbo->eprocmethod,
                'statusfbo' => $eprocfbo->statusfbo,
                
            ],
            'form' => [
                ['required_by', $eprocfbo->required_by],
                ['division', $eprocfbo->division],
                ['request_date', Carbon::parse($eprocfbo->request_date)->format('d/m/Y')],
                ['due_date', Carbon::parse($eprocfbo->due_date)->format('d/m/Y')],
                ['type_process', $eprocfbo->type_process],
                ['upload_srf', $eprocfbo->upload_srf],
                ['minimum', $eprocfbo->minimum],

            ],
            'update_url' => route('eprocfbo.update', ['eprocfbo' => $eprocfbo->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eprocfbo $eprocfbo)
    {
        DB::beginTransaction();

        try {

            if ($file = $request->file('upload_srf')) {
                $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $path = 'public/assets/documents/eproc/';
    
                /**
                 * Delete docin if exists.
                 */
                if($eprocfbo->upload_srf){
                    $result = str_replace('storage/', '', $eprocfbo->upload_srf);
                    Storage::delete('public/' . $result);
                }
    
                /**
                 * Store an docin to Storage
                 */
                $file->storeAs($path, $fileName);
                $fileName = 'storage/assets/documents/products/'.$fileName;
                // $validatedData['upload_srf'] = $fileName;
            }
        
            Eprocfbo::where('id', $eprocfbo->id)->update(array_merge(
            [
            'upload_srf'=>$fileName
            ],
            $request->only('required_by','division','request_date','due_date','type_process','upload_srf','tkdn_required','minimum','required_category','eprocmethod','statusfbo')
            )
        ); 

            DB::commit();

            return response()->json([
                'message' => 'FBO successfully updated'
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
    public function destroy(Eprocfbo $eprocfbo)
    {
        DB::beginTransaction();

        try {
            if($eprocfbo->upload_srf){
                $result = str_replace('storage/', '', $eprocfbo->upload_srf);
                    Storage::delete('public/' . $result);
            }

            Eprocfbo::destroy($eprocfbo->id);

            DB::commit();

            return response()->json([
                'message' => 'FBO successfully deleted'
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

    public function uploadSrf(Request $request)
    {
        $request->validate([
            'upload_srf' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('upload_srf')) {
            $file = $request->file('upload_srf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('upload_srfs', $fileName); // Simpan file di direktori 'upload_srfs'

            // Simpan informasi dokumen ke tabel 'upload_srf'
            $uploadSrf = new UploadSrf();
            $uploadSrf->name = $fileName;
            $uploadSrf->file_path = $filePath;
            $uploadSrf->save();

            return redirect()->back()->with('success', 'Certificate document uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload certificate document.');
    }

     /**
     * EXPORT EXCEL 
     */
    // public function exportExcel()
    // {
    //     return Excel::download(new PsvdatamasterExport, 'psvdatamaster_data.xlsx');
    //     // return redirect()->back()->with('success', 'Data exported successfully');

    // }

    //  /**
    //  * IMPORT EXCEL 
    //  */
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
        $model = Eprocfbo::select(
            'id',
            'required_by',
            'division',
            'request_date',
            // 'due_date',
            // 'type_process',
            // 'upload_srf',
            // 'tkdn_required',
            // 'minimum',
            // 'required_category',
            // 'eprocmethod',
            'statusfbo',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('eprocfbo.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('eprocfbo.edit', ['eprocfbo' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('eprocfbo.destroy', ['eprocfbo' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('eprocfbos')
            ->make(true);
    }

}
