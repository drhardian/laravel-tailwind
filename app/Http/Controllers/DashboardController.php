<?php

namespace App\Http\Controllers;

use App\Models\RequestOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexInternal()
    {
        return view('request_order.dashboard.internal.index');
    }

    public function getRequestOrderStatus()
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
}
