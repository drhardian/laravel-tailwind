<?php

namespace App\Http\Controllers\RequestOrder;

use App\Models\RequestOrder\Client;
use App\Models\RequestOrder\Contract;
use App\Models\RequestOrder\ContractActivity;
use App\Models\RequestOrder\RequestOrder;
use App\Models\RequestOrder\RequestOrderTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /*
        1 -> Received
        2 -> Work in progress
        3 -> Work completed
        4 -> Invoiced
        9 -> Paid
    */

    public function indexInternal()
    {
        $customersTotal = Client::get()->count();
        $contractsTotal = Contract::get()->count();
        $roTotal = RequestOrder::get()->count();
        $roOnProgressTotal = RequestOrder::where('status', 2)->get()->count();
        $roCompletedTotal = RequestOrder::where('status', 3)->get()->count();
        $roInvoicedTotal = RequestOrder::where('status', 4)->get()->count();
        $roPaidTotal = RequestOrder::where('status', 9)->get()->count();

        return view(
            'request_order.dashboard.internal.index',
            compact(
                'customersTotal',
                'contractsTotal',
                'roTotal',
                'roOnProgressTotal',
                'roCompletedTotal',
                'roInvoicedTotal',
                'roPaidTotal',
            )
        );
    }

    public function getRequestOrderStatus()
    {
        $rostatusChart = [];
        $rostatusTitle = [];
        $rostatusTotal = [];

        $queries = RequestOrder::select('status', DB::raw('count(*) as total'))->groupBy('status')->get();

        foreach ($queries as $query) {
            switch ($query->status) {
                case 1:
                    $statusTitle = "Received";
                    break;

                case 2:
                    $statusTitle = "Work in progress";
                    break;

                case 3:
                    $statusTitle = "Work completed";
                    break;

                case 4:
                    $statusTitle = "Invoiced";
                    break;

                default:
                    $statusTitle = "Paid";
                    break;
            }

            // $rostatusChart[] = $query->contract->contractactivities->id;
            $rostatusTitle[] = $statusTitle;
            $rostatusTotal[] = $query->total;
        }

        return response()->json([
            'sequence' => $rostatusChart,
            'labels' => $rostatusTitle,
            'series' => $rostatusTotal,
        ], 200);
    }

    public function getRequestOrderAmountStatus()
    {
        $rostatusTitle = [];
        $rostatusTotal = [];

        $queries = RequestOrder::select('status', DB::raw('count(*) as total'))->groupBy('status')->get();

        foreach ($queries as $query) {
            switch ($query->status) {
                case 1:
                    $statusTitle = "Received";
                    break;

                case 2:
                    $statusTitle = "Work in progress";
                    break;

                case 3:
                    $statusTitle = "Work completed";
                    break;

                case 4:
                    $statusTitle = "Invoiced";
                    break;

                default:
                    $statusTitle = "Paid";
                    break;
            }

            $rostatusTitle[] = $statusTitle;
            $rostatusTotal[] = $query->total;
        }

        return response()->json([
            'labels' => $rostatusTitle,
            'series' => $rostatusTotal,
        ], 200);
    }

    public function indexExternal()
    {
        $customer = Client::first();

        $customerId = $customer ? $customer->id:0;

        $contract = Contract::with('contractactivities')
            ->where('client_id', $customerId)
            ->orderBy('id', 'desc')
            ->offset(0)
            ->limit(1)
            ->first();

        $contractId = $contract ? $contract->id:0;
        $contractActivitiesValue = $contract ? $contract->contractactivities->sum('value'):0;

        $requestOrderCommitted = RequestOrder::where('contract_id', $contractId)->get();

        $requestOrderInvoiced = RequestOrder::where('contract_id', $contractId)
            ->where('status', 4)
            ->get();

        $requestOrderPaid = RequestOrder::where('contract_id', $contractId)
            ->where('status', 9)
            ->get();

        $requestOrderInProgress = $requestOrderCommitted->sum('sub_total') - $requestOrderInvoiced->sum('sub_total');

        $remainingContractValue = $contractActivitiesValue - ($requestOrderCommitted->sum('sub_total') + $requestOrderInvoiced->sum('sub_total') + $requestOrderPaid->sum('sub_total'));

        $activities = DB::table('request_order_activity')
            ->select(
                'request_order_activity.activity_code',
                'master_activity.activity_name',
                DB::raw('COUNT(request_order.ro_number) AS totalro'),
                'contract_activity_value.value'
            )
            ->leftJoin('request_order', 'request_order_activity.request_order_id', '=', 'request_order.id')
            ->leftJoin('master_activity', 'request_order_activity.activity_code', '=', 'master_activity.id')
            ->leftJoin('contract_activity_value', 'request_order_activity.activity_code', '=', 'contract_activity_value.activity_id')
            ->where('request_order.contract_id', $contractId)
            ->groupBy('request_order_activity.activity_code', 'master_activity.activity_name', 'contract_activity_value.value')
            ->orderBy('contract_activity_value.value', 'DESC')
            ->get();

        return view(
            'request_order.dashboard.external.index',
            compact(
                'customer',
                'contract',
                'activities',
                'requestOrderCommitted',
                'requestOrderInProgress',
                'requestOrderInvoiced',
                'requestOrderPaid',
                'remainingContractValue',
            )
        );
    }

    public function getDataChartActivities()
    {
        $charts = [];
        $valueOfActivity = ContractActivity::with('activity:id,activity_name')
            ->select(
                'contract_activity_value.activity_id',
                'contract_activity_value.value',
                'contract_activity_value.contract_id',
            )
            ->where('contract_id', request('contractId'))
            ->get();

        foreach ($valueOfActivity as $activity) {
            $usagePerActivity = 0;

            $orderActivity = DB::table('request_order_activity')
                ->select('request_order_trans.sub_total')
                ->leftJoin('request_order_trans', 'request_order_activity.request_order_id', '=', 'request_order_trans.request_order_id')
                ->where('activity_code', $activity->activity_id)
                ->orderBy('activity_code')
                ->get();
            foreach ($orderActivity as $order) {
                $usagePerActivity = $usagePerActivity + $order->sub_total;
            }

            $remaining = doubleval($activity->value) - doubleval($usagePerActivity);

            $charts[] = [
                'chartid' => $activity->activity_id,
                'series' => [doubleval($activity->value), $usagePerActivity, $remaining],
                'labels' => ['Budget', 'Usage', 'Remaining'],
                'colors' => ['#337CCF', '#F1C93B', '#7A9D54'],
            ];
        }

        return response()->json($charts, 200);
    }

    public function getDetailChartActivities()
    {
        $contractValuePerActivity = ContractActivity::select('value')
            ->where('contract_id',request('contractId'))
            ->where('activity_id',request('activityId'))
            ->first();

        $monthSequence = RequestOrder::select(
                DB::raw("DATE_FORMAT(start_date,'%Y-%m') as period"),
                DB::raw("DATE_FORMAT(start_date,'%b %Y') as periodString")
            )
            ->where('contract_id',request('contractId'))
            ->groupBy(
                DB::raw("DATE_FORMAT(start_date,'%Y-%m')"),
                DB::raw("DATE_FORMAT(start_date,'%b %Y')")
            )
            ->orderBy(DB::raw("DATE_FORMAT(start_date,'%Y-%m')"))
            ->get();

        $requestOrderIdByMonth = [];
        foreach ($monthSequence as $monthValue) {
            $getRequestOrderId = RequestOrder::with('orderactivity')
                ->select('request_order.id')
                ->where(DB::raw("DATE_FORMAT(start_date,'%Y-%m')"), $monthValue->period)
                ->whereHas('orderactivity', function($q) {
                    $q->where('activity_code',request('activityId'));
                })
                ->get();

            $orderIdPerMonth = [];

            foreach ($getRequestOrderId as $orderId) {
                $orderIdPerMonth[] = $orderId->id;
            }

            $orderTransaction = RequestOrderTransaction::whereIn('request_order_id',$orderIdPerMonth)->sum('sub_total');

            $requestOrderIdByMonth[] = [
                'x' => $monthValue->periodString,
                'y' => doubleval($orderTransaction),
                'goals' => [
                    array(
                        'name' => 'Expected',
                        'value' => doubleval($contractValuePerActivity->value/36),
                        'strokeHeight' => 5,
                        'strokeColor' => '#775DD0'
                    )
                ]
            ];
        }

        return response()->json([
            'series' => $requestOrderIdByMonth
        ],200);
    }
}
