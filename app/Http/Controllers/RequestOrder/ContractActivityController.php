<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\RequestOrder\ContractActivityStoreRequest;
use App\Models\RequestOrder\ContractActivity;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ContractActivityController extends Controller
{
    # store contract activity data
    public function store(ContractActivityStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            ContractActivity::create($request->only('activity_id','value','contract_id'));

            DB::commit();

            return response()->json([
                'message' => 'Activity successfully saved'
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
    public function edit(ContractActivity $contractactivity)
    {
        return response()->json([
            'activity_id' => [
                'text' => $contractactivity->activity->activity_name,
                'id' => $contractactivity->activity->id
            ],
            'value' => doubleval($contractactivity->value),
            'update_url' => route('contractactivity.update', ['contractactivity' => $contractactivity->id])
        ], 200);
    }

    # update costing data
    public function update(ContractActivityStoreRequest $request, ContractActivity $contractactivity)
    {
        DB::beginTransaction();

        try {
            $contractactivity->update($request->only('activity_id','value','contract_id'));

            DB::commit();

            return response()->json([
                'message' => 'Activity successfully updated'
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
    public function destroy(ContractActivity $contractactivity)
    {
        DB::beginTransaction();

        try {
            $contractactivity->delete();
            
            DB::commit();

            return response()->json([
                'message' => 'Activity successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # show costing item on datatable
    public function showDatatable()
    {
        $model = ContractActivity::with('contract','activity')
            ->select(
                'contract_activity_value.id',
                'contract_activity_value.contract_id',
                'contract_activity_value.activity_id',
                'contract_activity_value.value',
                'contract_activity_value.updated_at',
                'master_activity.activity_name'
            )
            ->where([
                ['contract_id', '=', request('contractId')]
            ]);

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $edit = '<a href="#" class="px-2" onclick="editActivityRecord(\''.route('contractactivity.edit', ['contractactivity' => $model->id]).'\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteActivityRecord(\''.route('contractactivity.destroy', ['contractactivity' => $model->id]).'\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $edit.$delete.        
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y');
            })
            ->addColumn('price_wcurrency', function($model) {
                return "<div class='flex justify-between w-full'><span>Rp.</span> ".number_format($model->value,2)."</div>";
            })
            ->rawColumns(['actions','price_wcurrency'])
            ->removeColumn([
                'activity_id',
                'contract_id',
                'activity.id',
                'activity.activity_code',
                'activity.activity_name',
                'activity.created_at',
                'activity.updated_at',
                'activity.has_item',
                'activity.has_sow',
                'contract.client_id',
                'contract.contract_number',
                'contract.created_at',
                'contract.created_by',
                'contract.description',
                'contract.details',
                'contract.end_date',
                'contract.id',
                'contract.start_date',
                'contract.updated_at',
                'contract.updated_by',
            ])
            ->make(true);
    }
}
