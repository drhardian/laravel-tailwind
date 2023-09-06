<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsvMasterData\Process;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ProcessController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Process Condition';
        $this->pageProfile = 'Process';
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

        return view('customerasset_psv.process.index', [
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
            $process = Process::create($request->only('service','equip_number','pid','size_basic','size_code','fluid','required','capacity_unit','mawp','operating_psi','back_psi','operating_temp','cold_diff','allowable'));
            
            DB::commit();

            return response()->json([
                'url' => route('process.show', [$process->id])
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
    public function show(Process $process)
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
                'url' => route('process.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];
        return view('customerasset_psv.process.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'process' => $process
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Process $process)
    {
        return response()->json([
            'form' => [
                ['service', $process->service],
                ['equip_number', $process->equip_number],
                ['pid', $process->pid],
                ['size_basic', $process->size_basic],
                ['size_code', $process->size_code],
                ['fluid', $process->fluid],
                ['required', $process->required],
                ['capacity_unit', $process->capacity_unit],
                ['mawp', $process->mawp],
                ['operating_psi', $process->operating_psi],
                ['back_psi', $process->back_psi],
                ['operating_temp', $process->operating_temp],
                ['cold_diff', $process->cold_diff],
                ['allowable', $process->allowable],
            ],
            'update_url' => route('process.update', ['process' => $process->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Process $process)
    {
        DB::beginTransaction();

        try {
            $process->update($request->only('service','equip_number','pid','size_basic','size_code','fluid','required','capacity_unit','mawp','operating_psi','back_psi','operating_temp','cold_diff','allowable'));
            
            DB::commit();

            return response()->json([
                'message' => 'process successfully updated'
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
    public function destroy(Process $process)
    {
        DB::beginTransaction();

        try {
            $process->delete();

            DB::commit();

            return response()->json([
                'message' => 'process successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    public function showDatatable()
    {
        $model = Process::select(
            'id',
            'service',
            'equip_number',
            'pid',
            'size_basic',
            'size_code',
            // 'fluid',
            // 'required',
            // 'capacity_unit',
            // 'mawp',
            // 'operating_psi',
            // 'back_psi',
            // 'operating_temp',
            // 'cold_diff',
            // 'allowable',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('process.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('process.edit', ['process' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('process.destroy', ['process' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('processs')
            ->make(true);
    }
}
