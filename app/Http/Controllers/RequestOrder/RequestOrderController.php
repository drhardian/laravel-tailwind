<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\RequestOrder\ROStoreRequest;
use App\Models\RequestOrder\RequestOrder;
use App\Models\RequestOrder\RequestOrderActivity;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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

        return view('request_order.requestorder.index', [
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

            $requestOrder = RequestOrder::create($request->only('contract_id', 'ro_number', 'start_date', 'end_date', 'so_number', 'status', 'client_id', 'activity_code', 'contract_type'));

            RequestOrderActivity::create([
                'request_order_id' => $requestOrder->id,
                'activity_code' => $request->activity_code
            ]);

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

    /**
     * Display the specified resource.
     */
    public function show(RequestOrder $requestorder)
    {
        $this->pageProfile = 'Request Order Items';

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
                'url' => route('requestorder.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('request_order.requestorder.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'requestorder' => $requestorder
        ]);
    }

    # Show the form for editing the specified resource.
    public function edit(RequestOrder $requestorder)
    {
        return response()->json([
            'dropdown' => [
                'contract' => [$requestorder->contract->id, $requestorder->contract->contract_number],
                'activity' => [$requestorder->orderactivity->activity_code, $requestorder->orderactivity->activity->activity_name],
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

            $requestorder->update($request->only('contract_id', 'ro_number', 'start_date', 'end_date', 'so_number', 'status', 'client_id', 'activity_code', 'contract_type'));

            RequestOrderActivity::where('request_order_id', $requestorder->id)
                ->update([
                    'activity_code' => $request->activity_code
                ]);

            DB::commit();

            return response()->json([
                'message' => 'Request Order successfully updated'
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
            if ($requestorder->orderdetails->count() == 0) {
                $requestorder->delete();

                DB::commit();

                return response()->json([
                    'message' => 'Request Order successfully deleted'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Please delete request order items first'
                ], 406);
            }
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
                $show = '<a href="' . route('requestorder.show', [$model->id]) . '" class="pr-2"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('requestorder.edit', ['requestorder' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = $model->orderdetails->count() == 0 ? '<a href="#" class="pl-2" onclick="deleteRecord(\'' . route('requestorder.destroy', ['requestorder' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>' : '';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('status', function ($model) {
                switch ($model->status) {
                    case 1:
                        $roStatus = '<a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Received</a>';
                        break;

                    case 2:
                        $roStatus = '<a href="#" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-xs font-semibold mr-2 px-2 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400 inline-flex items-center justify-center">Work in progress</a>';
                        break;
                        
                    case 3:
                        $roStatus = '<a href="#" class="bg-green-100 hover:bg-green-200 text-green-800 text-xs font-semibold mr-2 px-2 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400 inline-flex items-center justify-center">Work in completed</a>';
                        break;

                    case 4:
                        $roStatus = '<a href="#" class="bg-red-100 hover:bg-red-200 text-red-800 text-xs font-semibold mr-2 px-2 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 inline-flex items-center justify-center">Invoiced</a>';
                        break;

                    default:
                        $roStatus = '<span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">' .
                            '<svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">' .
                            '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>' .
                            '</svg>' .
                            '<span class="sr-only">Icon description</span>' .
                            '</span>';
                        break;
                }
                return $roStatus;
            })
            ->editColumn('start_date', function ($model) {
                return Carbon::parse($model->start_date)->format('d/m/Y');
            })
            ->addColumn('total_amount', function ($q) {
                return '<div class="flex justify-between"><span>Rp. </span>' . number_format($q->orderdetails->sum('sub_total')) . '</div>';
            })
            ->rawColumns(['actions', 'status', 'total_amount'])
            ->removeColumn(['client.id', 'client_id', 'orderactivity.activity_code', 'orderactivity.request_order_id', 'orderactivity.activity.id'])
            ->make(true);
    }

    # Display a listing of the resource on datatable based on contract id.
    public function showDatatableByContract()
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
                'request_order.start_date',
                'request_order.status'
            )
            ->where('contract_id',request('contractId'))
            ->orderBy('request_order.created_at', 'DESC');

        return DataTables::of($model)
            ->addColumn('ronumber', function ($model) {
                return '<a href="#" class="px-2 font-medium hover:underline" onclick="openForm('.$model->id.')">'.$model->ro_number.'</a>';
            })
            ->editColumn('status', function ($model) {
                switch ($model->status) {
                    case 1:
                        $roStatus = '<span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-3 py-1.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Received</span>';
                        break;

                    case 2:
                        $roStatus = '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-3 py-1.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Work in progress</span>';
                        break;

                    case 3:
                        $roStatus = '<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-3 py-1.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Work in completed</span>';
                        break;

                    case 4:
                        $roStatus = '<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-3 py-1.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Invoiced</span>';
                        break;

                    default:
                        $roStatus = '<span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-sm font-semibold text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">' .
                            '<svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">' .
                            '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>' .
                            '</svg>' .
                            '<span class="sr-only">Icon description</span>' .
                            '</span>';
                        break;
                }
                return $roStatus;
            })
            ->editColumn('start_date', function ($model) {
                return Carbon::parse($model->start_date)->format('d/m/Y');
            })
            ->addColumn('total_amount', function ($q) {
                return '<div class="flex justify-between"><span>Rp. </span>' . number_format($q->orderdetails->sum('sub_total')) . '</div>';
            })
            ->rawColumns(['ronumber', 'status', 'total_amount'])
            ->removeColumn(['client.id', 'client_id', 'orderactivity.activity_code', 'orderactivity.request_order_id', 'orderactivity.activity.id'])
            ->make(true);
    }
}
