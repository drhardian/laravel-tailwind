<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitrateStoreRequest;
use App\Http\Requests\UnitrateUpdateRequest;
use App\Models\ActivityUnitrate;
use App\Models\Item;
use App\Models\UnitRate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UnitRateController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Unit Rates';
    }

    # displaying initial data
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

        return view('unitrate.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    # storing new data
    public function store(UnitrateStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            UnitRate::create($request->only('rate_name'));

            DB::commit();

            return response()->json([
                'message' => 'Unit rate successfully saved'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Show the form for editing the specified resource.
    public function edit(UnitRate $unitrate)
    {
        return response()->json([
            'form' => [
                ['rate_name', $unitrate->rate_name]
            ],
            'update_url' => route('unitrate.update', ['unitrate' => $unitrate->id])
        ], 200);
    }

    # updating data
    public function update(UnitrateUpdateRequest $request, UnitRate $unitrate)
    {
        DB::beginTransaction();

        try {
            $unitrate->update($request->only('rate_name'));

            DB::commit();

            return response()->json([
                'message' => 'Unit rate successfully updated'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # delete record from table based on primary key
    public function destroy(UnitRate $unitrate)
    {
        DB::beginTransaction();

        try {
            $unitrate->delete();

            DB::commit();

            return response()->json([
                'message' => 'Unit rate successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Display a listing of the resource on selectbox.
    public function showActivityUnitrateOnDropdown()
    {
        $activityid = Item::select('master_activity_code')->find(request('itemid'));

        $queries = ActivityUnitrate::with('unitrate')->where('activity_code', $activityid->master_activity_code)->get();

        $response = [];

        foreach ($queries as $query) {
            $response[] = array(
                "id" => $query->unit_rate_id,
                "text" => $query->unitrate->rate_name,
            );
        }

        return response()->json($response);
    }

    # Display a listing of the resource on selectbox.
    public function showOnDropdown()
    {
        $queries = UnitRate::when(request('search', false), function ($query) {
            return $query->where('rate_name', 'like', '%' . request('search') . '%');
        })->get();

        $response = [];

        foreach ($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->rate_name,
            );
        }

        return response()->json($response);
    }

    public function showDatatable()
    {
        $model = UnitRate::select('id', 'rate_name', 'updated_at');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('unitrate.edit', ['unitrate' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteRecord(\'' . route('unitrate.destroy', ['unitrate' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
