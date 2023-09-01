<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\RequestOrder\CostingStoreRequest;
use App\Models\RequestOrder\Costing;
use App\Models\RequestOrder\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;


class CostingController extends Controller
{
    # store costing data
    public function store(CostingStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            Costing::create($request->only('client_id','contract_id','item_id','unit_rate_id','price'));

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
    public function edit(Costing $costing)
    {
        $item = Item::with('activity:id,activity_name','itemtype:id,type_name')
                    ->select('item.id','item.size','item.class','item.master_activity_code','item.item_type_id')
                    ->find($costing->item_id);
        
        $sizeDesc = $item->size ? ', '.$item->size : '';
        $classDesc = $item->class ? ', '.$item->class : '';

        return response()->json([
            'item_id' => [
                'text' => $item->activity->activity_name.' ('.$item->itemtype->type_name.$sizeDesc.$classDesc.')',
                'id' => $item->id
            ],
            'unit_rate_id' => [
                'text' => $costing->unitrate->rate_name,
                'id' => $costing->unit_rate_id
            ],
            'price' => doubleval($costing->price),
            'update_url' => route('costing.update', ['costing' => $costing->id])
        ], 200);
    }

    # update costing data
    public function update(CostingStoreRequest $request, Costing $costing)
    {
        DB::beginTransaction();

        try {
            $costing->update($request->only('client_id','contract_id','item_id','unit_rate_id','price'));

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
    public function destroy(Costing $costing)
    {
        DB::beginTransaction();

        try {
            $costing->delete();
            
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
        $queries = Costing::with([
            'item:id,size,class,description,master_activity_code,item_type_id',
            'item.activity:id,activity_name',
            'item.itemtype:id,type_name', 
            'unitrate:id,rate_name'
        ])
        ->select(
            'costing.id',
            'costing.item_id',
            'costing.unit_rate_id',
            'costing.price'
        )
        ->where('contract_id', request('contractId'))
        ->when(request('search',false), function($query) {
            $query->where(function($query) {
                $query->orWhereHas('item', function($q) {
                    $q->where('size', 'like', '%'.request('search').'%')
                    ->orWhere('class', 'like', '%'.request('search').'%')
                    ->orWhere('description', 'like', '%'.request('search').'%');
                })
                ->orWhereHas('item.activity', function($q) {
                    $q->where('activity_name','like','%'.request('search').'%');
                })
                ->orWhereHas('item.itemtype', function($q) {
                    $q->where('type_name','like','%'.request('search').'%');
                })
                ->orWhereHas('unitrate', function($q) {
                    $q->where('rate_name','like','%'.request('search').'%');
                });
            });
        }, function($query) {
            return $query->limit(50);
        })
        ->get();

        $response = [];

        foreach($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->item->size,
                "class" => $query->item->class,
                "activity" => $query->item->activity->activity_name,
                "itemtype" => $query->item->itemtype->type_name,
                "unitrate" => $query->unitrate->rate_name,
                "price" => number_format($query->price)
            );
        }

        return response()->json($response);
    }

    # show costing item on datatable
    public function showDatatable()
    {
        $model = Costing::with('unitrate','item','item.activity','item.itemtype')
            ->select('costing.id','client_id','contract_id','item_id','unit_rate_id','price','costing.created_at','costing.updated_at')
            ->where([
                ['client_id', request('clientId')],
                ['contract_id', request('contractId')]
            ])
            ->orderByDesc('created_at');

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $edit = '<a href="#" class="px-2" onclick="editCostingRecord(\''.route('costing.edit', ['costing' => $model->id]).'\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteCostingRecord(\''.route('costing.destroy', ['costing' => $model->id]).'\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $edit.$delete.        
                    '</div>';

                return $actions;
            })
            ->addColumn('rate_type', function($model) {
                return $model->unitrate->rate_name;
            })
            ->addColumn('description', function($model) {
                $activityName = $model->item->activity->activity_name ? '<p><small>Activity:</small> '.$model->item->activity->activity_name.'</p>' : '';
                $typeName = $model->item->itemtype->type_name ? '<p><small>Type:</small> '.$model->item->itemtype->type_name.'</p>' : '';
                $itemSize = $model->item->size ? '<p><small>Size:</small> '.$model->item->size.'</p>' : '';
                $itemClass = $model->item->class ? '<p><small>Class</small>: '.$model->item->class.'</p>' : '';

                return $activityName.$typeName.$itemSize.$itemClass;
            })
            ->addColumn('price_wcurrency', function($model) {
                return "<div class='flex justify-between w-full'><span>Rp.</span> ".number_format($model->price,2)."</div>";
            })
            ->editColumn('created_at', function($model) {
                return Carbon::parse($model->created_at)->format('d/m/Y');
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y');
            })
            ->rawColumns(['actions','description','price_wcurrency'])
            ->removeColumn([
                'id',
                'item_id',
                'client_id',
                'contract_id',
                'unit_rate_id',
                'rate_name',
                'item.id',
                'item.item_type_id',
                'item.master_activity_code',
                'item.description',
                'item.activity.id',
                'item.activity.activity_code',
                'item.activity.has_item',
                'item.activity.has_sow',
                'item.activity.created_at',
                'item.activity.updated_at',
                'item.itemtype.id',
                'item.itemtype.activity_id',
                'item.itemtype.created_at',
                'unitrate.id',
            ])
            ->make(true);
    }
}
