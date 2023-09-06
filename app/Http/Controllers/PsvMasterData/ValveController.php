<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsvMasterData\Valve;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;


class ValveController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Valve Information';
        $this->pageProfile = 'Valve';
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

        return view('customerasset_psv.valve.index', [
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
            $valve = Valve::create($request->only('manufacture','model_number','serial_number','size_in','rating_in','size_out','rating_out','press','vacuum','psv','design','selection','psv_capacity','psv_capacityunit','bonnet','seat','CAP','body_bonnet','disc_material','spring_material','guide_material','resilient_seat','bellow_material','year_build','year_install'));
            
            DB::commit();

            return response()->json([
                'url' => route('valve.show', [$valve->id])
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
    public function show(Valve $valve)
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
                'url' => route('valve.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];
        return view('customerasset_psv.valve.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'valve' => $valve
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Valve $valve)
    {
        return response()->json([
            'dropdown' => [
                'size_in' => $valve->size_in,
            ],
            'form' => [
                ['manufacture', $valve->manufacture],
                ['model_number', $valve->model_number],
                ['serial_number', $valve->serial_number],
                ['rating_in', $valve->rating_in],
                ['size_out', $valve->size_out],
                ['rating_out', $valve->rating_out],
                ['press', $valve->press],
                ['vacuum', $valve->vacuum],
                ['psv', $valve->psv],
                ['design', $valve->design],
                ['selection', $valve->selection],
                ['psv_capacity', $valve->psv_capacity],
                ['psv_capacityunit', $valve->psv_capacityunit],
                ['bonnet', $valve->bonnet],
                ['seat', $valve->seat],
                ['CAP', $valve->CAP],
                ['body_bonnet', $valve->body_bonnet],
                ['disc_material', $valve->disc_material],
                ['spring_material', $valve->spring_material],
                ['guide_material', $valve->guide_material],
                ['resilient_seat', $valve->resilient_seat],
                ['bellow_material', $valve->bellow_material],
                ['year_build', $valve->year_build],
                ['year_install', $valve->year_install],
            ],
            'update_url' => route('valve.update', ['valve' => $valve->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Valve $valve)
    {
        DB::beginTransaction();

        try {
            $valve->update($request->only('manufacture','model_number','serial_number','size_in','rating_in','size_out','rating_out','press','vacuum','psv','design','selection','psv_capacity','psv_capacityunit','bonnet','seat','CAP','body_bonnet','disc_material','spring_material','guide_material','resilient_seat','bellow_material','year_build','year_install'));
            
            DB::commit();

            return response()->json([
                'message' => 'valve successfully updated'
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
    public function destroy(Valve $valve)
    {
        DB::beginTransaction();

        try {
            $valve->delete();

            DB::commit();

            return response()->json([
                'message' => 'valve successfully deleted'
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
        $model = Valve::select(
            'id',
            'manufacture',
            'model_number',
            'serial_number',
            'size_in',
            'rating_in',
            'size_out',
            'rating_out',
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
            'year_build',
            'year_install',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('valve.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('valve.edit', ['valve' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('valve.destroy', ['valve' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('valves')
            ->make(true);
    }
}