<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsvMasterData\General;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use App\Exports\GeneralExport;
use App\Imports\GeneralImport;
use Maatwebsite\Excel\Facades\Excel;

class GeneralController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'General Information';
        $this->pageProfile = 'General';
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

        return view('customerasset_psv.general.index', [
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
            $general = General::create($request->only('area','flow','platform','tag_number','operational','integrity','cert_date','exp_date','valve_number','status','deferal','resetting','resize','demolish','relief','note','cert_package','klarifikasi','by'));
            
            DB::commit();

            return response()->json([
                'url' => route('general.show', [$general->id])
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
    public function show(General $general)
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
                'url' => route('general.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customerasset_psv.general.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'general' => $general
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(General $general)
    {
        return response()->json([
            'dropdown' => [
                'area' => $general->area,
                'flow' => $general->flow,
                'platform' => $general->platform,
                'demolish' => $general->demolish,
                'relief' => $general->relief,
            ],
            'form' => [
                ['tag_number', $general->tag_number],
                ['operational', $general->operational],
                ['integrity', $general->integrity],
                ['cert_date', $general->cert_date],
                ['exp_date', $general->exp_date],
                ['valve_number', $general->valve_number],
                ['status', $general->status],
                ['deferal', $general->deferal],
                ['resetting', $general->resetting],
                ['resize', $general->resize],
                ['note', $general->note],
                ['cert_package', $general->cert_package],
                ['klarifikasi', $general->klarifikasi],
                ['by', $general->by],

            ],
            'update_url' => route('general.update', ['general' => $general->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, General $general)
    {
        DB::beginTransaction();

        try {
            $general->update($request->only('area','flow','platform','tag_number','operational','integrity','cert_date','exp_date','valve_number','status','deferal','resetting','resize','demolish','relief','note','cert_package','klarifikasi','by'));

            DB::commit();

            return response()->json([
                'message' => 'general successfully updated'
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
    public function destroy(General $general)
    {
        DB::beginTransaction();

        try {
            $general->delete();

            DB::commit();

            return response()->json([
                'message' => 'general successfully deleted'
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
    //     return Excel::download(new GeneralExport, 'general_data.xlsx');
    // }

     /**
     * IMPORT EXCEL 
     */
    // public function importExcel(Request $request)
    // {
    //     $file = $request->file('excel_file');

    //     Excel::import(new GeneralImport, $file);

    //     return redirect()->back()->with('success', 'Data imported successfully');
    // }

    public function showDatatable()
    {
        $model = General::select(
            'id',
            'area',
            'flow',
            'platform',
            'tag_number',
            // 'operational',
            // 'integrity',
            // 'cert_date',
            // 'exp_date',
            'valve_number',
            'status',
            // 'deferal',
            // 'resetting',
            // 'resize',
            // 'demolish',
            // 'relief',
            // 'note',
            // 'cert_package',
            // 'klarifikasi',
            'by',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('general.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('general.edit', ['general' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('general.destroy', ['general' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('generals')
            ->make(true);
    }
}