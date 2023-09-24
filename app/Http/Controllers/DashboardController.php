<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contract;
use App\Models\RequestOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $roOnProgressTotal = RequestOrder::where('status',2)->get()->count();
        $roCompletedTotal = RequestOrder::where('status',3)->get()->count();
        $roInvoicedTotal = RequestOrder::where('status',4)->get()->count();
        $roPaidTotal = RequestOrder::where('status',9)->get()->count();

        return view('request_order.dashboard.internal.index', 
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

    // public function getRequestOrderAmountStatus()
    // {
    //     $rostatusTitle = [];
    //     $rostatusTotal = [];

    //     $queries = RequestOrder::select('status', DB::raw('count(*) as total'))->groupBy('status')->get();

    //     foreach ($queries as $query) {
    //         switch ($query->status) {
    //             case 1:
    //                 $statusTitle = "Received";
    //                 break;
                
    //             case 2:
    //                 $statusTitle = "Work in progress";
    //                 break;
                
    //             case 3:
    //                 $statusTitle = "Work completed";
    //                 break;
                
    //             case 4:
    //                 $statusTitle = "Invoiced";
    //                 break;
                
    //             default:
    //                 $statusTitle = "Paid";
    //                 break;
    //         }

    //         $rostatusTitle[] = $statusTitle;
    //         $rostatusTotal[] = $query->total;
    //     }

    //     return response()->json([
    //         'labels' => $rostatusTitle,
    //         'series' => $rostatusTotal,
    //     ], 200);
    // }

    public function indexExternal()
    {
        $customersTotal = Client::get()->count();
        $contractsTotal = Contract::get()->count();
        $roTotal = RequestOrder::get()->count();
        $roOnProgressTotal = RequestOrder::where('status',2)->get()->count();
        $roCompletedTotal = RequestOrder::where('status',3)->get()->count();
        $roInvoicedTotal = RequestOrder::where('status',4)->get()->count();
        $roPaidTotal = RequestOrder::where('status',9)->get()->count();

        return view('request_order.dashboard.internal.index', 
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
}
