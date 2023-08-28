<?php

namespace App\Http\Controllers;

use App\Models\RequestOrderTransaction;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RequestOrderItemController extends Controller
{
    # storing new data
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            RequestOrderTransaction::create($request->only('request_order_id', 'costing_id', 'quantity', 'unit_price', 'sub_total'));

            DB::commit();

            return response()->json([
                'message' => 'New item successfully saved'
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
    public function edit(RequestOrderTransaction $requestorderitem)
    {
        return response()->json([
            'costing_id' => [$requestorderitem->costing_id, $requestorderitem->costing->item->activity->activity_name . ' (' . $requestorderitem->costing->item->itemtype->type_name . $requestorderitem->costing->item->size . $requestorderitem->costing->item->class . ')'],
            'form' => [
                ['unit_price', number_format($requestorderitem->unit_price)],
                ['quantity', $requestorderitem->quantity],
                ['sub_total', number_format($requestorderitem->sub_total)],
            ],
            'update_url' => route('requestorderitem.update', ['requestorderitem' => $requestorderitem->id])
        ], 200);
    }

    # updating data
    public function update(Request $request, RequestOrderTransaction $requestorderitem)
    {
        DB::beginTransaction();

        try {
            $requestorderitem->update($request->only('request_order_id', 'costing_id', 'quantity', 'unit_price', 'sub_total'));

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
    public function destroy(RequestOrderTransaction $requestorderitem)
    {
        DB::beginTransaction();

        try {
            $requestorderitem->delete();

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

    # Display a listing of the items on datatable.
    public function showDatatable()
    {
        $model = RequestOrderTransaction::with('costing.item')
            ->where('request_order_id', request('requestId'))
            ->orderBy('id', 'desc');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('requestorderitem.edit', ['requestorderitem' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="pl-2" onclick="deleteRecord(\'' . route('requestorderitem.destroy', ['requestorderitem' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->addColumn('description', function ($model) {
                $activityName = $model->costing->item->activity->activity_name ? '<p><small>Activity:</small> ' . $model->costing->item->activity->activity_name . '</p>' : '';
                $typeName = $model->costing->item->itemtype->type_name ? '<p><small>Type:</small> ' . $model->costing->item->itemtype->type_name . '</p>' : '';
                $itemSize = $model->costing->item->size ? '<p><small>Size:</small> ' . $model->costing->item->size . '</p>' : '';
                $itemClass = $model->costing->item->class ? '<p><small>Class</small>: ' . $model->costing->item->class . '</p>' : '';
                $rateType = $model->costing->unitrate->rate_name ? '<p><small>Rate</small>: ' . $model->costing->unitrate->rate_name . '</p>' : '';

                return $activityName . $typeName . $itemSize . $itemClass . $rateType;
            })
            ->editColumn('unit_price', function ($query) {
                return '<div class="flex justify-between"><span>Rp. </span>' . number_format($query->unit_price) . '</div>';
            })
            ->editColumn('sub_total', function ($query) {
                return '<div class="flex justify-between"><span>Rp. </span>' . number_format($query->sub_total) . '</div>';
            })
            ->rawColumns(['description', 'unit_price', 'sub_total', 'actions'])
            ->make(true);
    }

    public function showTotalAmount()
    {
        try {
            $totalAmount = RequestOrderTransaction::where('request_order_id',request('requestorder_id'))->sum('sub_total');
    
            return number_format($totalAmount);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return "Error while calculating total amount";
        }
    }
}
