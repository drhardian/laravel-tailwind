<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\RequestOrder\ItemStoreRequest;
use App\Models\RequestOrder\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Items';
    }

    # Display a listing of the resource.
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

        return view('request_order.item.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    # storing new data
    public function store(ItemStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            Item::create($request->only(
                'master_activity_code',
                'item_type_id',
                'size',
                'class',
                'description'
            ));

            DB::commit();

            return response()->json([
                'message' => 'Item successfully saved'
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
    public function edit(Item $item)
    {
        return response()->json([
            'master_activity_code' => [ $item->master_activity_code,$item->activity->activity_name ],
            'item_type_id' => [ $item->item_type_id,$item->itemtype->type_name ],
            'form' => [
                ['size', $item->size],
                ['class', $item->class],
                ['description', $item->description],
            ],
            'update_url' => route('item.update', ['item' => $item->id])
        ], 200);
    }

    # updating data
    public function update(ItemStoreRequest $request, Item $item)
    {
        DB::beginTransaction();

        try {
            $item->update($request->only(
                'master_activity_code',
                'item_type_id',
                'size',
                'class',
                'description'
            ));

            DB::commit();

            return response()->json([
                'message' => 'Item successfully updated'
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
    public function destroy(Item $item)
    {
        DB::beginTransaction();

        try {
            $item->delete();

            DB::commit();

            return response()->json([
                'message' => 'Item successfully deleted'
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
    public function showOnDropdown()
    {
        $queries = Item::with('activity:id,activity_name','itemtype:id,type_name')
                    ->select('item.id','item.size','item.class','item.master_activity_code','item.item_type_id')
                    ->when(request('search', false), function($query) {
                        return $query->where('item.class', 'like', '%'.request('search').'%')
                                    ->orWhere('item.size', 'like', '%'.request('search').'%')
                                    ->orWhereHas('activity', function($q) {
                                        $q->where('activity_name','like','%'.request('search').'%');
                                    })
                                    ->orWhereHas('itemtype', function($q) {
                                        $q->where('type_name','like','%'.request('search').'%');
                                    });
                    }, function($query) {
                        return $query->limit(50);
                    })
                    ->get();

        $response = [];

        foreach($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->size,
                "class" => $query->class,
                "activity" => $query->activity->activity_name,
                "itemtype" => $query->itemtype->type_name
            );
        }

        return response()->json($response);
    }

    # Display a listing of the resource on datatable.
    public function showDatatable()
    {
        $model = Item::with(['activity:id,activity_name','itemtype:id,type_name'])
        ->select(
            'item.id',
            'item.size',
            'item.class',
            'item.description',
            'item.master_activity_code',
            'item.item_type_id',
            'item.updated_at'
        )
        ->orderBy('item.created_at', 'DESC');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('item.edit', ['item' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteRecord(\'' . route('item.destroy', ['item' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn(
                'activity.id',
                'item_type_id',
                'master_activity_code',
                'itemtype.id',
            )
            ->make(true);
    }
}
