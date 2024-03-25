<?php

namespace App\Http\Controllers;

use App\Imports\PintarDataImport;
use App\Models\OnwjPintarAsset;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\Log;
use ParseError;

class OnwjPintarAssetController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'PINTAR Assets';
        $this->pageProfile = 'PINTAR Assets';
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

        return view('customer_asset.onwj.pintar.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(OnwjPintarAsset $onwjPintarAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnwjPintarAsset $onwjPintarAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnwjPintarAsset $onwjPintarAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OnwjPintarAsset $onwjPintarAsset)
    {
        //
    }
    public function showDatatable()
    {
        $model = OnwjPintarAsset::query();

        return DataTables::of($model)
            ->editColumn('integritystatus', function ($query) {
                switch ($query->integritystatus) {
                    case 'Green':
                        $integrityBadge = '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-green-900 dark:text-green-300">Green</span>';
                        break;

                    case 'Red':
                        $integrityBadge = '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-red-900 dark:text-red-300">Red</span>';
                        # code...
                        break;

                    default:
                        $integrityBadge = '<span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Black</span>';
                        # code...
                        break;
                }

                return $integrityBadge;
            })
            ->editColumn('controlvalvestatus', function ($query) {
                switch ($query->controlvalvestatus) {
                    case 'Green':
                        $controlvalvestatusBadge = '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-green-900 dark:text-green-300">Green</span>';
                        break;

                    case 'Red':
                        $controlvalvestatusBadge = '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-red-900 dark:text-red-300">Red</span>';
                        # code...
                        break;

                    default:
                        $controlvalvestatusBadge = '<span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Black</span>';
                        # code...
                        break;
                }

                return $controlvalvestatusBadge;
            })
            ->editColumn('rtu', function ($query) {
                switch ($query->rtu) {
                    case 'Green':
                        $rtuBadge = '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-green-900 dark:text-green-300">Green</span>';
                        break;

                    case 'Red':
                        $rtuBadge = '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-red-900 dark:text-red-300">Red</span>';
                        # code...
                        break;

                    default:
                        $rtuBadge = '<span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Black</span>';
                        # code...
                        break;
                }

                return $rtuBadge;
            })
            ->editColumn('meter', function ($query) {
                switch ($query->meter) {
                    case 'Green':
                        $meterBadge = '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-green-900 dark:text-green-300">Green</span>';
                        break;

                    case 'Red':
                        $meterBadge = '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-red-900 dark:text-red-300">Red</span>';
                        # code...
                        break;

                    default:
                        $meterBadge = '<span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Black</span>';
                        # code...
                        break;
                }

                return $meterBadge;
            })
            ->editColumn('powersystem', function ($query) {
                switch ($query->powersystem) {
                    case 'Green':
                        $powersystemBadge = '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-green-900 dark:text-green-300">Green</span>';
                        break;

                    case 'Red':
                        $powersystemBadge = '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-red-900 dark:text-red-300">Red</span>';
                        # code...
                        break;

                    default:
                        $powersystemBadge = '<span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-1 rounded dark:bg-gray-700 dark:text-gray-300">Black</span>';
                        # code...
                        break;
                }

                return $powersystemBadge;
            })
            ->rawColumns(['integritystatus', 'controlvalvestatus', 'rtu', 'meter', 'powersystem'])
            ->make(true);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new PintarDataImport, $request->file('file'));

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

        $areas = OnwjPintarAsset::select('area')
            ->groupBy('area')
            ->orderBy('area')
            ->get();

        # Get integrity chart data for all areas
        $allAreas = [];
        $integrityPerAreas = OnwjPintarAsset::select('integritystatus')
            ->selectRaw('COUNT(integritystatus) AS totalStatus')
            ->groupBy('integritystatus')
            ->get();

        $integrityData = [];
        foreach ($integrityPerAreas as $integrityPerArea) {
            switch ($integrityPerArea->integritystatus) {
                case 'Green':
                    $color = "#00B050";
                    break;

                case 'Yellow':
                    $color = "#ffff00";
                    break;

                case 'Red':
                    $color = "#d31900";
                    break;

                default:
                    $color = "#000000";
                    break;
            }

            $integrityData[] = (object)[
                'name' => $integrityPerArea->integritystatus,
                'y' => $integrityPerArea->totalStatus,
                'color' => $color
            ];
        }

        $allAreas[] = [
            'title' => 'All Areas',
            'data' => $integrityData
        ];

        # Get integrity chart data for all areas
        $detailPerAreas = [];
        foreach ($areas as $area) {
            $integrityPerAreas = OnwjPintarAsset::select('area', 'integritystatus')
                ->selectRaw('COUNT(integritystatus) AS totalStatus')
                ->where('area', $area->area)
                ->groupBy('area', 'integritystatus')
                ->orderBy('area')
                ->get();

            $integrityData = [];
            foreach ($integrityPerAreas as $integrityPerArea) {
                switch ($integrityPerArea->integritystatus) {
                    case 'Green':
                        $color = "#00B050";
                        break;

                    case 'Yellow':
                        $color = "#ffff00";
                        break;

                    case 'Red':
                        $color = "#d31900";
                        break;

                    default:
                        $color = "#000000";
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

        // # Delete all data on table firegas_summary_integrity
        // FiregasSummaryIntegrity::truncate();

        // # insert total equipment on table firegas_summary_integrity
        // FiregasSummaryIntegrity::create([
        //     'code' => 'TE',
        //     'description' => 'TOTAL EQUIPMENT',
        //     'total' => FiregasAsset::count()
        // ]);

        // # insert equipment defect on table firegas_summary_integrity
        // FiregasSummaryIntegrity::create([
        //     'code' => 'ED',
        //     'description' => 'EQUIPMENT DEFECT',
        //     'total' => FiregasAsset::where('integritystatus','Red')->orWhere('integritystatus','Yellow')->count()
        // ]);

        // # insert equipment good on table firegas_summary_integrity
        // FiregasSummaryIntegrity::create([
        //     'code' => 'EG',
        //     'description' => 'EQUIPMENT GOOD',
        //     'total' => FiregasAsset::where('integritystatus','Green')->count()
        // ]);

        // # insert integrity on table firegas_summary_integrity
        // FiregasSummaryIntegrity::create([
        //     'code' => 'IG',
        //     'description' => 'INTEGRITY',
        //     'total' => (FiregasAsset::where('integritystatus','Green')->count() > 0) ? round((FiregasAsset::where('integritystatus','Green')->count() / FiregasAsset::count()) * 100, 2) : 0
        // ]);

        // DB::select('CALL SP_FireGas_Summ_Detector');
        // DB::select('CALL SP_FireGas_Summ_Flow');

        // # Integrity Chart
        // $firegasIntegrityChartData = [];
        // $firegasIntegrities = FiregasSummaryIntegrity::select('code','description','total')
        //     ->where('code','ED')
        //     ->orWhere('code','EG')
        //     ->get();

        // foreach ($firegasIntegrities as $firegasIntegrity) {
        //     $color = $firegasIntegrity->code === "ED" ? "#d31900" : "#00B050";

        //     $firegasIntegrityChartData[] = (object)[
        //         'name' => $firegasIntegrity->description,
        //         'y' => $firegasIntegrity->total,
        //         'color' => $color
        //     ];

        //     $color = "";
        // }

        $allAreaIntegrityResumes = OnwjPintarAsset::select('integritystatus')
            ->selectRaw('COUNT(integritystatus) AS totalStatus')
            ->groupBy('integritystatus')
            ->get();

        // $firegasSummDetectors = FiregasSummaryDetector::get();
        // $firegasSummFlows = FiregasSummaryFlow::orderBy('flow_location')->get();

        // return view('customer_asset.onwj.pintar.dashboard', [
        //     'breadcrumbs' => $breadcrumbs,
        //     'title' => 'Dashboard'
        // ],compact('areas','detailPerAreas','firegasIntegrityChartData','firegasIntegrityResumes','firegasSummDetectors','firegasSummFlows'));

        return view('customer_asset.onwj.pintar.dashboard', [
            'breadcrumbs' => $breadcrumbs,
            'title' => 'Dashboard'
        ], compact(
            'areas',
            'detailPerAreas',
            'allAreas',
            'allAreaIntegrityResumes'
        ));
    }
}
