<?php

namespace App\Http\Controllers;

use App\Http\Requests\ROStoreRequest;
use App\Models\RequestOrder;
use App\Models\RequestOrderActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RequestOrderController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Request Orders';
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

        return view('requestorder.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    public function store(ROStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $clientId = ContractController::getClientIdByContractNumber($request->contract_id);

            $request->merge([
                'client_id' => $clientId,
                'contract_type' => 'RO'
            ]);

            $requestOrder = RequestOrder::create($request->only('contract_id','ro_number','start_date','end_date','so_number','status','client_id','activity_code','contract_type'));
            
            // RequestOrderActivity::create([
            //     'request_order_id' => $requestOrder->id,
            //     'activity_code' => $request->activity_code
            // ]);

            DB::commit();

            return response()->json([
                'message' => 'Request Order successfully saved'
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
    public function edit(RequestOrder $requestorder)
    {
        return response()->json([
            'dropdown' => [
                'contract' => [ $requestorder->contract->id, $requestorder->contract->contract_number ],
                'activity' => [ $requestorder->orderactivity->activity_code, $requestorder->orderactivity->activity->activity_name ],
                'status' => $requestorder->status
            ],
            'form' => [
                ['ro_number', $requestorder->ro_number],
                ['so_number', $requestorder->so_number],
                ['start_date', Carbon::parse($requestorder->start_date)->format('d/m/Y')],
                ['end_date', Carbon::parse($requestorder->end_date)->format('d/m/Y')],
            ],
            'update_url' => route('requestorder.update', ['requestorder' => $requestorder->id])
        ], 200);
    }

    # updating data
    public function update(ROStoreRequest $request, RequestOrder $requestorder)
    {
        DB::beginTransaction();

        try {
            $clientId = ContractController::getClientIdByContractNumber($request->contract_id);

            $request->merge([
                'client_id' => $clientId,
                'contract_type' => 'RO'
            ]);

            $requestorder->update($request->only('contract_id','ro_number','start_date','end_date','so_number','status','client_id','activity_code','contract_type'));

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

    # Remove the specified resource from storage.
    public function destroy(RequestOrder $requestorder)
    {
        DB::beginTransaction();

        try {
            $requestorder->delete();

            DB::commit();

            return response()->json([
                'message' => 'Request Order successfully deleted'
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
        $model = RequestOrder::with('client:id,name')
            ->with([
                'orderactivity:activity_code,request_order_id' => [
                    'activity:id,activity_name'
                ]
            ])
            ->with('orderdetails')
            ->select(
                'request_order.id',
                'request_order.client_id',
                'request_order.ro_number',
                'request_order.so_number',
                'request_order.start_date',
                'request_order.status'
            )
            ->orderBy('request_order.created_at', 'DESC');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '<a href="'.route('client.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('requestorder.edit', ['requestorder' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = $model->orderdetails->count() == 0 ? '<a href="#" class="px-2" onclick="deleteRecord(\'' . route('requestorder.destroy', ['requestorder' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>' : '';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('status', function ($model) {
                return '<span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-3 py-1.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Default</span>';
            })
            ->editColumn('start_date', function ($model) {
                return Carbon::parse($model->start_date)->format('d/m/Y');
            })
            ->rawColumns(['actions','status'])
            ->removeColumn(['client.id','client_id','orderactivity.activity_code','orderactivity.request_order_id','orderactivity.activity.id'])
            ->make(true);
    }
}
