<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsvMasterData\Condi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class CondiController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Condi Information';
        $this->pageProfile = 'Condi';
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

        return view('customerasset_psv.condi.index', [
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
            $condi = Condi::create($request->only('shutdown','valve_upstream','condi_upstream','valve_downstream','condi_downstream','scaffolding','spacer_inlet','spacer_outlet'));
            
            DB::commit();

            return response()->json([
                'url' => route('condi.show', [$condi->id])
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
    public function show(Condi $condi)
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
                'url' => route('condi.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customerasset_psv.condi.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'condi' => $condi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Condi $condi)
    {
        return response()->json([
            'form' => [
                ['shutdown', $condi->shutdown],
                ['valve_upstream', $condi->valve_upstream],
                ['condi_upstream', $condi->condi_upstream],
                ['valve_downstream', $condi->valve_downstream],
                ['condi_downstream', $condi->condi_downstream],
                ['scaffolding', $condi->scaffolding],
                ['spacer_inlet', $condi->spacer_inlet],
                ['spacer_outlet', $condi->spacer_outlet],

            ],
            'update_url' => route('condi.update', ['condi' => $condi->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Condi $condi)
    {
        DB::beginTransaction();

        try {
            $condi->update($request->only('shutdown','valve_upstream','condi_upstream','valve_downstream','condi_downstream','scaffolding','spacer_inlet','spacer_outlet'));

            DB::commit();

            return response()->json([
                'message' => 'condi successfully updated'
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
    public function destroy(Condi $condi)
    {
        DB::beginTransaction();

        try {
            $condi->delete();

            DB::commit();

            return response()->json([
                'message' => 'condi successfully deleted'
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
        $model = Condi::select(
            'id',
            'shutdown',
            // 'valve_upstream',
            // 'condi_upstream',
            // 'valve_downstream',
            // 'condi_downstream',
            'scaffolding',
            'spacer_inlet',
            'spacer_outlet',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('condi.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('condi.edit', ['condi' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('condi.destroy', ['condi' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('condis')
            ->make(true);
    }
}