<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsvMasterData\Psvdatamaster;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PsvdatamasterImport;
use App\Exports\PsvdatamasterExport;
use App\Models\PsvMasterData\CertDoc;
use PDF;


class PsvdatamasterController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'PSV Data Master';
        $this->pageProfile = 'PSV Data Master';
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

        return view('customerasset_psv.psvdatamaster.index', [
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
            //  * Handle upload pdf cert_doc
            //  */
            $file = $request->file('cert_doc');
                $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $path = 'public/assets/documents/psv/'; 

            //     /**
            //      * Upload an cert_doc to Storage
            //      */
                $file->storeAs($path, $fileName);
                $fileName = 'storage/assets/documents/psv/'.$fileName;
                // $validatedData['cert_doc'] = $fileName;
            

            $psvdatamaster = Psvdatamaster::create(array_merge(
                [
                'cert_doc'=>$fileName
                ],
                $request->only('area','flow','platform','tag_number','operational','integrity','cert_date','exp_date','valve_number','status','deferal','resetting','resize','demolish','relief','note','cert_package','klarifikasi','by','manufacture','model_number','serial_number','size_in','rating_in','condi_in','size_out','rating_out','condi_out','press','vacuum','psv','design','selection','psv_capacity','psv_capacityunit','bonnet','seat','CAP','body_bonnet','disc_material','spring_material','guide_material','resilient_seat','bellow_material','year_build','year_install','service','equip_number','pid','size_basic','size_code','fluid','required','capacity_unit','mawp','operating_psi','back_psi','operating_temp','cold_diff','allowable','shutdown','valve_upstream','condi_upstream','valve_downstream','condi_downstream','scaffolding','spacer_inlet','spacer_outlet')
                )
            ); 
            
            DB::commit();

            return response()->json([
                'message' => 'Psvdatamaster has been created!'
            ], 200);

            // return response()->json([
            //     'url' => route('psvdatamaster.show', [$psvdatamaster->id])
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
    public function show(Psvdatamaster $psvdatamaster)
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
                'url' => route('psvdatamaster.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customerasset_psv.psvdatamaster.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'psvdatamaster' => $psvdatamaster
        ]);
    }

    //PRINT PDF

    public function cetakPdf($id)
    {
        // Ambil data yang akan dicetak
        $psvdatamaster = Psvdatamaster::findOrFail($id);
        // \Log::debug($psvdatamaster);

    
        // Cetak PDF dari tampilan (view) 'pdf.view' dengan data yang diambil
        $pdf = PDF::loadView('customerasset_psv.psvdatamaster.pdfview', compact('psvdatamaster'));
    
        // Opsional: Atur ukuran dan orientasi halaman PDF
        $pdf->setPaper('A4', 'portrait');
    
        // Opsional: Download PDF dengan nama yang sesuai
        return $pdf->download('psvdatamaster.pdf');
    
        // Tampilkan PDF dalam browser
        return $pdf->stream('psvdatamaster.pdf');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psvdatamaster $psvdatamaster)
    {
        return response()->json([
            'dropdown' => [
                //General Information
                'area' => $psvdatamaster->area,
                'flow' => $psvdatamaster->flow,
                'platform' => $psvdatamaster->platform,
                'status' => $psvdatamaster->status,
                'demolish' => $psvdatamaster->demolish,
                'relief' => $psvdatamaster->relief,
                //Valve Information
                'size_in'=> $psvdatamaster->size_in,
                'rating_in'=> $psvdatamaster->rating_in,
                'condi_in'=>$psvdatamaster->condi_in,
                'size_out'=> $psvdatamaster->size_out,
                'rating_out'=> $psvdatamaster->rating_out,
                'condi_out'=> $psvdatamaster->condi_out,
                'manufacture'=> $psvdatamaster->manufacture,
                'psv'=> $psvdatamaster->psv,


            ],
            'form' => [
                //General Information
                ['tag_number', $psvdatamaster->tag_number],
                ['operational', $psvdatamaster->operational],
                ['integrity', $psvdatamaster->integrity],
                ['cert_date', Carbon::parse($psvdatamaster->cert_date)->format('d/m/Y')],
                ['cert_doc', $psvdatamaster->cert_doc],
                ['exp_date', Carbon::parse($psvdatamaster->exp_date)->format('d/m/Y')],
                ['valve_number', $psvdatamaster->valve_number],
                ['deferal', $psvdatamaster->deferal],
                ['resetting', $psvdatamaster->resetting],
                ['resize', $psvdatamaster->resize],
                ['note', $psvdatamaster->note],
                ['cert_package', $psvdatamaster->cert_package],
                ['klarifikasi', $psvdatamaster->klarifikasi],
                ['by', $psvdatamaster->by],
                //Valve Information
                ['model_number', $psvdatamaster->model_number],
                ['serial_number', $psvdatamaster->serial_number],
                ['press', $psvdatamaster->press],
                ['vacuum', $psvdatamaster->vacuum],
                ['design', $psvdatamaster->design],
                ['selection', $psvdatamaster->selection],
                ['psv_capacity', $psvdatamaster->psv_capacity],
                ['psv_capacityunit', $psvdatamaster->psv_capacityunit],
                ['bonnet', $psvdatamaster->bonnet],
                ['seat', $psvdatamaster->seat],
                ['CAP', $psvdatamaster->CAP],
                ['body_bonnet', $psvdatamaster->body_bonnet],
                ['disc_material', $psvdatamaster->disc_material],
                ['spring_material', $psvdatamaster->spring_material],
                ['guide_material', $psvdatamaster->guide_material],
                ['resilient_seat', $psvdatamaster->resilient_seat],
                ['bellow_material', $psvdatamaster->bellow_material],
                ['year_build', $psvdatamaster->year_build],
                ['year_install', $psvdatamaster->year_install],
                //Process Condition
                ['service', $psvdatamaster->service],
                ['equip_number', $psvdatamaster->equip_number],
                ['pid', $psvdatamaster->pid],
                ['size_basic', $psvdatamaster->size_basic],
                ['size_code', $psvdatamaster->size_code],
                ['fluid', $psvdatamaster->fluid],
                ['required', $psvdatamaster->required],
                ['capacity_unit', $psvdatamaster->capacity_unit],
                ['mawp', $psvdatamaster->mawp],
                ['operating_psi', $psvdatamaster->operating_psi],
                ['back_psi', $psvdatamaster->back_psi],
                ['operating_temp', $psvdatamaster->operating_temp],
                ['cold_diff', $psvdatamaster->cold_diff],
                ['allowable', $psvdatamaster->allowable],
                //Condition Replacement
                ['shutdown', $psvdatamaster->shutdown],
                ['valve_upstream', $psvdatamaster->valve_upstream],
                ['condi_upstream', $psvdatamaster->condi_upstream],
                ['valve_downstream', $psvdatamaster->valve_downstream],
                ['condi_downstream', $psvdatamaster->condi_downstream],
                ['scaffolding', $psvdatamaster->scaffolding],
                ['spacer_inlet', $psvdatamaster->spacer_inlet],
                ['spacer_outlet', $psvdatamaster->spacer_outlet],
            ],
            'update_url' => route('psvdatamaster.update', ['psvdatamaster' => $psvdatamaster->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Psvdatamaster $psvdatamaster)
    {
        DB::beginTransaction();

        try {

            if ($file = $request->file('cert_doc')) {
                $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $path = 'public/assets/documents/psv/';
    
                /**
                 * Delete docin if exists.
                 */
                if($psvdatamaster->cert_doc){
                    $result = str_replace('storage/', '', $psvdatamaster->cert_doc);
                    Storage::delete('public/' . $result);
                }
    
                /**
                 * Store an docin to Storage
                 */
                $file->storeAs($path, $fileName);
                $fileName = 'storage/assets/documents/products/'.$fileName;
                // $validatedData['cert_doc'] = $fileName;
            }
        
        Psvdatamaster::where('id', $psvdatamaster->id)->update(array_merge(
            [
            'cert_doc'=>$fileName
            ],
            $request->only('area','flow','platform','tag_number','operational','integrity','cert_date','exp_date','valve_number','status','deferal','resetting','resize','demolish','relief','note','cert_package','klarifikasi','by','manufacture','model_number','serial_number','size_in','rating_in','condi_in','size_out','rating_out','condi_out','press','vacuum','psv','design','selection','psv_capacity','psv_capacityunit','bonnet','seat','CAP','body_bonnet','disc_material','spring_material','guide_material','resilient_seat','bellow_material','year_build','year_install','service','equip_number','pid','size_basic','size_code','fluid','required','capacity_unit','mawp','operating_psi','back_psi','operating_temp','cold_diff','allowable','shutdown','valve_upstream','condi_upstream','valve_downstream','condi_downstream','scaffolding','spacer_inlet','spacer_outlet')
            )
        ); 

            DB::commit();

            return response()->json([
                'message' => 'psvdatamaster successfully updated'
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
    public function destroy(Psvdatamaster $psvdatamaster)
    {
        DB::beginTransaction();

        try {
            if($psvdatamaster->cert_doc){
                $result = str_replace('storage/', '', $psvdatamaster->cert_doc);
                    Storage::delete('public/' . $result);
            }

            Psvdatamaster::destroy($psvdatamaster->id);

            DB::commit();

            return response()->json([
                'message' => 'psv data master successfully deleted'
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

    public function uploadCertDoc(Request $request)
    {
        $request->validate([
            'cert_doc' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('cert_doc')) {
            $file = $request->file('cert_doc');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('cert_docs', $fileName); // Simpan file di direktori 'cert_docs'

            // Simpan informasi dokumen ke tabel 'cert_doc'
            $certDoc = new CertDoc();
            $certDoc->name = $fileName;
            $certDoc->file_path = $filePath;
            $certDoc->save();

            return redirect()->back()->with('success', 'Certificate document uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload certificate document.');
    }

     /**
     * EXPORT EXCEL 
     */
    public function exportExcel()
    {
        return Excel::download(new PsvdatamasterExport, 'psvdatamaster_data.xlsx');
        // return redirect()->back()->with('success', 'Data exported successfully');

    }

     /**
     * IMPORT EXCEL 
     */
    public function importExcel(Request $request)
    {
        // \Log::debug($request);
        $file = $request->file('filexls');
        Excel::import(new PsvdatamasterImport, $file);

        // return redirect()->back()->with('success', 'Data imported successfully');
        return response()->json([
            'message' => 'Data imported successfully'
        ], 200);
    }

    public function showDatatable()
    {
        $model = Psvdatamaster::select(
            'id',
            //GENERAL INFORMATION
            'area',
            'flow',
            'platform',
            'tag_number',
            // 'operational',
            'integrity',
            'cert_date',
            // 'cert_doc',
            // 'exp_date',
            'valve_number',
            'status',
            'by',
            // 'deferal',
            // 'resetting',
            // 'resize',
            // 'demolish',
            // 'relief',
            // 'note',
            // 'cert_package',
            // 'klarifikasi',
            //VALVE INFORMATION
            // 'manufacture',
            // 'model_number',
            // 'serial_number',
            // 'size_in',
            // 'rating_in',
            // 'condi_in',
            // 'size_out',
            // 'rating_out',
            // 'condi_out',
            // 'press',
            // 'vacuum',
            // 'psv',
            // 'design',
            // 'selection',
            // 'psv_capacity',
            // 'psv_capacityunit',
            // 'bonnet',
            // 'seat',
            // 'CAP',
            // 'body_bonnet',
            // 'disc_material',
            // 'spring_material',
            // 'guide_material',
            // 'resilient_seat',
            // 'bellow_material',
            // 'year_build',
            // 'year_install',
            // 'updated_at'
            //PROCESS CONDITION
            // 'service',
            // 'equip_number',
            // 'pid',
            // 'size_basic',
            // 'size_code',
            // 'fluid',
            // 'required',
            // 'capacity_unit',
            // 'mawp',
            // 'operating_psi',
            // 'back_psi',
            // 'operating_temp',
            // 'cold_diff',
            // 'allowable',
            //CONDITION REPLACEMENT
            // 'shutdown',
            // 'valve_upstream',
            // 'condi_upstream',
            // 'valve_downstream',
            // 'condi_downstream',
            // 'scaffolding',
            // 'spacer_inlet',
            // 'spacer_outlet',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('psvdatamaster.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('psvdatamaster.edit', ['psvdatamaster' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('psvdatamaster.destroy', ['psvdatamaster' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('psvdatamasters')
            ->make(true);
    }
}
