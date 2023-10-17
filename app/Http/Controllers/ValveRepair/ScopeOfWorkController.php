<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\ValveRepair\RepairReport;
use App\Models\ValveRepair\ScopeOfWork;
use App\Models\ValveRepair\ValveRepairDropdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ScopeOfWorkController extends Controller
{
    protected $pageTitle;

    public function __construct()
    {
        $this->pageTitle = 'Valve Repair Report';
    }


    # storing new data
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Assuming you have the necessary values in the request data
            $requestOrderId = $request->input('repair_report_id_sow');
            $scopeOfWorkId = $request->input('scope_of_work_id');
            ScopeOfWork::create([
                'repair_report_id' => $requestOrderId,
                'scope_of_work_id' => $scopeOfWorkId,
            ]);


            DB::commit();

            return response()->json(
                [
                    'message' => 'New Data successfully saved',
                ],
                200,
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(
                [
                    'message' => 'The server encountered an error and could not complete your request',
                ],
                500,
            );
        }
    }

        /**
     * Display the specified resource.
     */
    public function show(ScopeOfWork $scopeofwork)
    {
        $breadcrumbs = [
            [
                'title' => 'Valve Repair Report',
                'status' => 'active',
                'url' => route('valverepair.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'General Information',
                'status' => 'active',
                'url' => route('valverepair.show', [$scopeofwork->repair_report_id]),
                'icon' => '',
            ],
            [
                'title' => 'Scope Of Work '. $scopeofwork->scopeOfWork->dropdown_label,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];
        $vrr_dropdown = ValveRepairDropdown::all();
        return view('valve_repair.scopeofwork.show', [
            'title' => $this->pageTitle,
            'breadcrumbs' => $breadcrumbs,
            'scopeofwork' => $scopeofwork,
            'vrr_dropdown' => $vrr_dropdown,
            'valverepair' => $scopeofwork->repairReport,
        ]);
    }

        # Display a listing of the resource on datatable.
        public function showDatatable()
        {
            $model = ScopeOfWork::select('id', 'repair_report_id', 'scope_of_work_id');

            return DataTables::of($model)
                ->addColumn('actions', function ($model) {
                    $show = '';
                    $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('scopeofwork.edit', ['scopeofwork' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                    $delete = '<a href="#" class="px-2" onclick="deleteRecord(\'' . route('scopeofwork.destroy', ['scopeofwork' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                    $actions = '<div class="row flex">' .
                        $show . $edit . $delete .
                        '</div>';

                    return $actions;
                })
                ->editColumn('scope_of_work_id', function ($model) {
                    $editLink = route('valverepair.scopeofwork.show', ['scopeofwork' => $model->id, 'repairid' => $model->repairReport->id]);
                    return '<a href="' . $editLink . '" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">' . $model->scopeOfWork->dropdown_label . '</a>';
                })
                ->rawColumns(['actions','scope_of_work_id'])
                ->make(true);
        }
}
