<?php

namespace App\Http\Controllers;

use App\Imports\FiregasDataImport;
use App\Models\FiregasAsset;
use App\Models\FiregasSummaryDetector;
use App\Models\FiregasSummaryIntegrity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\DB;
use ParseError;

class FiregasAssetController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Fire Gas Assets';
        $this->pageProfile = 'Fire Gas Assets';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => route('firegas.dashboard'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customer_asset.firegas.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => route('firegas.dashboard'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'Assets',
                'status' => 'active',
                'url' => route('firegas.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('customer_asset.firegas.create', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FiregasAsset $firegasAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FiregasAsset $firegasAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FiregasAsset $firegasAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FiregasAsset $firegasAsset)
    {
        //
    }

    public function showDatatable()
    {
        $model = FiregasAsset::query();

        return DataTables::of($model)->make(true);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new FiregasDataImport, $request->file('file'));

            return response()->json([
                'message' => 'Data imported successfully'
            ], 200);
        } catch (ParseError $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function dashboard()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => '',
                'url' => '',
                'icon' => 'fa-solid fa-house fa-sm',
            ]
        ];

        $detailPerAreas = [];
        $areas = FiregasAsset::select('area')
            ->groupBy('area')
            ->orderBy('area')
            ->get();

        foreach ($areas as $area) {
            $integrityPerAreas = FiregasAsset::select('area','integritystatus')
                ->selectRaw('COUNT(integritystatus) AS totalStatus')
                ->where('area',$area->area)
                ->groupBy('area','integritystatus')
                ->orderBy('area')
                ->get();

            $integrityData = [];
            foreach ($integrityPerAreas as $integrityPerArea) {
                switch ($integrityPerArea->integritystatus) {
                    case 'Green':
                        $color = "#7ab317";
                        break;

                    case 'Yellow':
                        $color = "#ffff00";
                        break;

                    default:
                        $color = "#d31900";
                        break;
                }

                $integrityData[] = (object)[
                    'name' => $integrityPerArea->integritystatus,
                    'y' => $integrityPerArea->totalStatus,
                    'color' => $color
                ];
            }

            $detailPerAreas[] = [
                'title' => $area->area,
                'data' => $integrityData
            ];

            $integrityData = [];
        }

        # Delete all data on table firegas_summary_integrity
        FiregasSummaryIntegrity::truncate();

        # insert total equipment on table firegas_summary_integrity
        FiregasSummaryIntegrity::create([
            'code' => 'TE',
            'description' => 'TOTAL EQUIPMENT',
            'total' => FiregasAsset::count()
        ]);

        # insert equipment defect on table firegas_summary_integrity
        FiregasSummaryIntegrity::create([
            'code' => 'ED',
            'description' => 'EQUIPMENT DEFECT',
            'total' => FiregasAsset::where('integritystatus','Red')->orWhere('integritystatus','Yellow')->count()
        ]);

        # insert equipment good on table firegas_summary_integrity
        FiregasSummaryIntegrity::create([
            'code' => 'EG',
            'description' => 'EQUIPMENT GOOD',
            'total' => FiregasAsset::where('integritystatus','Green')->count()
        ]);

        # insert integrity on table firegas_summary_integrity
        FiregasSummaryIntegrity::create([
            'code' => 'IG',
            'description' => 'INTEGRITY',
            'total' => round((FiregasAsset::where('integritystatus','Green')->count() / FiregasAsset::count()) * 100, 2)
        ]);

        DB::select('CALL SP_FireGas_Summ_Detector');

        return view('customer_asset.firegas.dashboard', [
            'breadcrumbs' => $breadcrumbs,
            'title' => 'Dashboard'
        ],compact('areas','detailPerAreas'));
    }
}
