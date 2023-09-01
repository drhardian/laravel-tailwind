<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\RequestOrder\ItemtypeStoreRequest;
use App\Http\Requests\RequestOrder\ItemtypeUpdateRequest;
use App\Models\RequestOrder\ItemType;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ItemTypeController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Item Types';
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

        return view('request_order.itemtype.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    # storing new data
    public function store(ItemtypeStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            ItemType::create($request->only('activity_id','type_name'));

            DB::commit();

            return response()->json([
                'message' => 'Item type successfully saved'
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
    public function edit(ItemType $itemtype)
    {
        return response()->json([
            'activity' => [ $itemtype->activity_id,$itemtype->activity->activity_name ],
            'type_name' => $itemtype->type_name,
            'update_url' => route('itemtype.update', ['itemtype' => $itemtype->id])
        ], 200);
    }

    # updating data
    public function update(ItemtypeUpdateRequest $request, ItemType $itemtype)
    {
        DB::beginTransaction();

        try {
            $itemtype->update($request->only('activity_id','type_name'));

            DB::commit();

            return response()->json([
                'message' => 'Item type successfully updated'
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
    public function destroy(ItemType $itemtype)
    {
        DB::beginTransaction();

        try {
            $itemtype->delete();

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

    # Display a listing of the resource on datatable.
    public function showDatatable()
    {
        $model = ItemType::with('activity')
        ->select(
            'master_item_type.id',
            'master_item_type.type_name',
            'master_item_type.activity_id',
            'master_activity.activity_name'
        );

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('itemtype.edit', ['itemtype' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteRecord(\'' . route('itemtype.destroy', ['itemtype' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
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
    
    # Display a listing of the resource on selectbox.
    public function showOnDropdown()
    {
        $queries = ItemType::select('id', 'type_name')
            ->where('activity_id', request('activity_id'))
            ->when(request('search', false), function ($query) {
                $query->where('type_name', 'like', '%' . request('search') . '%');
            })
            ->get();

        $response = [];

        foreach ($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->type_name,
            );
        }

        return response()->json($response);
    }
}
