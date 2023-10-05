<?php

namespace App\Http\Controllers\PsvMasterData;

use App\Http\Controllers\Controller;
use App\Models\PsvMasterData\Psvdatamaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class PsvdashboardController extends Controller
{
    public function index()
    {
        //UNTUK MENJUMLAHKAN DATA PSV
        $psvTotal = Psvdatamaster::get()->count();
        
        //UNTUK MENJUMLAHKAN DATA PSV BERDASARKAN BULAN SAAT INI
        $currentMonth = date('m');
        $totalPsvByMonth = Psvdatamaster::whereMonth('cert_date', '=', $currentMonth)->count();
        // dd($totalPsvByMonth);

        // Mengambil data tag_number berdasarkan bulan
        $monthlyTagNumbers = [];

        for ($month = 1; $month <= 12; $month++) {
            $PsvByMonth = Psvdatamaster::whereMonth('cert_date', '=', $month)->count();
            $monthlyPsvTotals[$month] = $PsvByMonth;

            // Mengambil data tag_number berdasarkan bulan
            $tagNumberByMonth = Psvdatamaster::whereMonth('cert_date', '=', $month)->pluck('tag_number');
            $monthlyTagNumbers[$month] = $tagNumberByMonth;
        }

        // UNTUK MENJUMLAHKAN TOTAL OPERATIONAL PER ITEM
        $psvTotalYes = $this->getTotalByOperational('Yes');
        $psvTotalNo = $this->getTotalByOperational('No');
        $yesCount = Psvdatamaster::where('operational', 'Yes')->count();
        $noCount = Psvdatamaster::where('operational', 'No')->count();

        // UNTUK MENJUMLAHKAN TOTAL INTEGRITY PER ITEM
        // $psvTotalGreen = $this->getTotalByOperational('Green');
        // $psvTotalRed = $this->getTotalByOperational('Red');
        // $greenCount = Psvdatamaster::where('integrity', 'Green')->count();
        // $redCount = Psvdatamaster::where('integrity', 'Red')->count();
        
        $psvintegritycount = DB::table('psvdata_master')
        ->select('integrity', DB::raw('COUNT(*) as jumlahintegrity'))
        ->groupBy('integrity')
        ->get();

        // $psvintegritywarnacount = DB::table('psvdata_master')
        // ->select(
        // DB::raw('SUM(CASE WHEN integrity = "green" THEN 1 ELSE 0 END) as jumlah_green'),
        // DB::raw('SUM(CASE WHEN integrity = "red" THEN 1 ELSE 0 END) as jumlah_red')
        // )
        // ->get();

        // \Log::debug($psvintegritycount);
        
        // UNTUK MENJUMLAHKAN TOTAL AREA PER ITEM
        $psvareacount = DB::table('psvdata_master')
        ->select('area', DB::raw('COUNT(*) as jumlaharea'))
        ->groupBy('area')
        ->get();
        
        // UNTUK MENJUMLAHKAN TOTAL FLOW PER ITEM
        $psvflowcount = DB::table('psvdata_master')
        ->select('flow', DB::raw('COUNT(*) as jumlahflow'))
        ->groupBy('flow')
        ->get();

        // UNTUK MENJUMLAHKAN TOTAL psv STYLE PER ITEM
        $psvstylecount = DB::table('psvdata_master')
        ->select('psv', DB::raw('COUNT(*) as jumlahstyle'))
        ->groupBy('psv')
        ->get();

        // UNTUK MENGETAHUI SISA HARI 
        // $psvcertdatecount = DB::table('psvdata_master')
        // ->select('psv', DB::raw('DATEDIFF(cert_date,DATE(NOW()) as jumlahhari'))
        // ->where('id')
        // ->get();

        // UNTUK MENJUMLAHKAN TOTAL PSV SIZE PER ITEM
        $psvsizecount = DB::table('psvdata_master')
        ->select('size_in', DB::raw('COUNT(*) as jumlahsize'))
        ->groupBy('size_in')
        ->get();

        // UNTUK MENJUMLAHKAN TOTAL PSV BRAND PER ITEM
        $psvbrandcount = DB::table('psvdata_master')
        ->select('manufacture', DB::raw('COUNT(*) as jumlahbrand'))
        ->groupBy('manufacture')
        ->get();

        // UNTUK MENJUMLAHKAN TOTAL PLATFORM PER ITEM
        $psvplatformcount = DB::table('psvdata_master')
        ->select('platform', DB::raw('COUNT(*) as jumlahplatform'))
        ->groupBy('platform')
        ->get();

        // $contractsTotal = Contract::get()->count();
        // $roTotal = RequestOrder::get()->count();
        // $roOnProgressTotal = RequestOrder::where('status',2)->get()->count();
        // $roCompletedTotal = RequestOrder::where('status',3)->get()->count();
        // $roInvoicedTotal = RequestOrder::where('status',4)->get()->count();
        // $roPaidTotal = RequestOrder::where('status',9)->get()->count();

        return view('customerasset_psv.psvdashboard.dashboard', 
            compact(
                'monthlyPsvTotals',
                'PsvByMonth',
                'psvTotal',
                'currentMonth',
                'totalPsvByMonth',
                'monthlyTagNumbers',

                //OPERATIONAL
                'psvTotalYes',
                'psvTotalNo',
                'yesCount',
                'noCount',

                //INTEGRITY
                // 'psvTotalGreen',
                // 'psvTotalRed',
                // 'greenCount',
                // 'redCount',
                'psvintegritycount',
                // 'psvintegritywarnacount',

                // AREA
                'psvareacount',

                //PSV STYLE
                'psvstylecount',

                // FLOW STATION
                'psvflowcount',

                //PSV SIZE
                'psvsizecount',

                //PSV BRAND
                'psvbrandcount',
                
                //PLATFORM
                'psvplatformcount',

                // 'psvcertdatecount',

            )
        );
    }

    public function getTotalByOperational($operational)
    {
        $operatotal = Psvdatamaster::where('operational', $operational)->count();
        return $operatotal;
    }

    public function date(Request $request): Response
    {
        $query = Psvdatamaster::query();
        $dateFilter = $request->date_filter;

        switch($dateFilter){
            case 'today':
                $query->whereDate('cert_date',Carbon::today());
                break;
            case 'yesterday':
                $query->wheredate('cert_date',Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('cert_date',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $query->whereBetween('cert_date',[Carbon::now()->subWeek(),Carbon::now()]);
                break;
            case 'this_month':
                $query->whereMonth('cert_date',Carbon::now()->month);
                break;
            case 'last_month':
                $query->whereMonth('cert_date',Carbon::now()->subMonth()->month);
                break;
            case 'this_year':
                $query->whereYear('cert_date',Carbon::now()->year);
                break;
            case 'last_year':
                $query->whereYear('cert_date',Carbon::now()->subYear()->year);
                break;                       
        }
            
        $psvdatamasterfilter = $query->get();

        return response()->view('index',compact('psvdatamasterfilter','dateFilter'));
    }


    // public function getTotalByArea($area)
    // {
    //     $total = Psvdatamaster::where('area', $area)->count();
    //     return $total;
    // }

    // public function getTotalByIntegrity($integrity)
    // {
    //     $integtotal = Psvdatamaster::where('integrity', $integrity)->count();
    //     return $integtotal;
    // }

    // public function getPsvDataPerMonth()
    // {
    //     $psvDataPerMonth = [];

    //     $monthlyCounts = Psvdatamaster::select(
    //         DB::raw('YEAR(created_at) as year'),
    //         DB::raw('MONTH(created_at) as month'),
    //         DB::raw('count(*) as total')
    //     )
    //         ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
    //         ->orderBy(DB::raw('YEAR(created_at)'), 'asc')
    //         ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
    //         ->get();

    //     foreach ($monthlyCounts as $monthlyCount) {
    //         $psvDataPerMonth[] = [
    //             'year' => $monthlyCount->year,
    //             'month' => $monthlyCount->month,
    //             'total' => $monthlyCount->total,
    //         ];
    //     }

    //     return response()->json($psvDataPerMonth, 200);
    // }
}

    // public function indexExternal()
    // {
    //     $customersTotal = Client::get()->count();
    //     $contractsTotal = Contract::get()->count();
    //     $roTotal = RequestOrder::get()->count();
    //     $roOnProgressTotal = RequestOrder::where('status',2)->get()->count();
    //     $roCompletedTotal = RequestOrder::where('status',3)->get()->count();
    //     $roInvoicedTotal = RequestOrder::where('status',4)->get()->count();
    //     $roPaidTotal = RequestOrder::where('status',9)->get()->count();

    //     return view('request_order.dashboard.internal.index', 
    //         compact(
    //             'customersTotal',
    //             'contractsTotal',
    //             'roTotal',
    //             'roOnProgressTotal',
    //             'roCompletedTotal',
    //             'roInvoicedTotal',
    //             'roPaidTotal',
    //         )
    //     );
    // }

// }
