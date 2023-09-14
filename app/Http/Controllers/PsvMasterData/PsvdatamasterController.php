<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsvMasterData\Psvdatamaster;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

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
        DB::beginTransaction();

        try {
            $psvdatamaster = Psvdatamaster::create($request->only('area','flow','platform','tag_number','operational','integrity','cert_date','exp_date','valve_number','status','deferal','resetting','resize','demolish','relief','note','cert_package','klarifikasi','by','manufacture','model_number','serial_number','size_in','rating_in','size_out','rating_out','press','vacuum','psv','design','selection','psv_capacity','psv_capacityunit','bonnet','seat','CAP','body_bonnet','disc_material','spring_material','guide_material','resilient_seat','bellow_material','year_build','year_install','service','equip_number','pid','size_basic','size_code','fluid','required','capacity_unit','mawp','operating_psi','back_psi','operating_temp','cold_diff','allowable','shutdown','valve_upstream','condi_upstream','valve_downstream','condi_downstream','scaffolding','spacer_inlet','spacer_outlet'));
            
            DB::commit();

            return response()->json([
                'url' => route('psvdatamaster.show', [$psvdatamaster->id])
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();

            return response()->json([
                'error' => 'error'
            ], 500);
        }

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
                'size_out'=> $psvdatamaster->size_out,
                'rating_out'=> $psvdatamaster->rating_out,
            ],
            'form' => [
                //General Information
                ['tag_number', $psvdatamaster->tag_number],
                ['operational', $psvdatamaster->operational],
                ['integrity', $psvdatamaster->integrity],
                ['cert_date', Carbon::parse($psvdatamaster->cert_date)->format('d/m/Y')],
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
                ['manufacture', $psvdatamaster->manufacture],
                ['model_number', $psvdatamaster->model_number],
                ['serial_number', $psvdatamaster->serial_number],
                ['press', $psvdatamaster->press],
                ['vacuum', $psvdatamaster->vacuum],
                ['psv', $psvdatamaster->psv],
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
                ['year_build', Carbon::parse($psvdatamaster->year_build)->format('d/m/Y')],
                ['year_install', Carbon::parse($psvdatamaster->year_install)->format('d/m/Y')],
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
            $psvdatamaster->update($request->only('area','flow','platform','tag_number','operational','integrity','cert_date','exp_date','valve_number','status','deferal','resetting','resize','demolish','relief','note','cert_package','klarifikasi','by','manufacture','model_number','serial_number','size_in','rating_in','size_out','rating_out','press','vacuum','psv','design','selection','psv_capacity','psv_capacityunit','bonnet','seat','CAP','body_bonnet','disc_material','spring_material','guide_material','resilient_seat','bellow_material','year_build','year_install','service','equip_number','pid','size_basic','size_code','fluid','required','capacity_unit','mawp','operating_psi','back_psi','operating_temp','cold_diff','allowable','shutdown','valve_upstream','condi_upstream','valve_downstream','condi_downstream','scaffolding','spacer_inlet','spacer_outlet'));

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
     * Remove the specified resource from storage.
     */
    public function destroy(Psvdatamaster $psvdatamaster)
    {
        DB::beginTransaction();

        try {
            $psvdatamaster->delete();

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
    }

     /**
     * EXPORT EXCEL 
     */
    // public function exportExcel()
    // {
    //     return Excel::download(new PsvdatamasterExport, 'psvdatamaster_data.xlsx');
    // }

     /**
     * IMPORT EXCEL 
     */
    // public function importExcel(Request $request)
    // {
    //     $file = $request->file('excel_file');

    //     Excel::import(new PsvdatamasterImport, $file);

    //     return redirect()->back()->with('success', 'Data imported successfully');
    // }

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
            // 'cert_date',
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
            // 'psvdata_valve.manufacture',
            // 'psvdata_valve.model_number',
            // 'psvdata_valve.serial_number',
            // 'psvdata_valve.size_in',
            // 'psvdata_valve.rating_in',
            // 'psvdata_valve.size_out',
            // 'psvdata_valve.rating_out',
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
            // 'psvdata_valve.year_build',
            // 'psvdata_valve.year_install',
            // 'psvdata_valve.updated_at'
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
