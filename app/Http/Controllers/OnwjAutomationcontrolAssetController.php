<?php

namespace App\Http\Controllers;

use App\Imports\AutomationcontrolImport;
use App\Models\OnwjAutomationcontrolAsset;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\Log;
use ParseError;

class OnwjAutomationcontrolAssetController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Automation Control Assets';
        $this->pageProfile = 'Automation Control Assets';
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

        return view('customer_asset.onwj.automationcontrol.index', [
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
    public function show(OnwjAutomationcontrolAsset $onwjAutomationcontrolAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnwjAutomationcontrolAsset $onwjAutomationcontrolAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnwjAutomationcontrolAsset $onwjAutomationcontrolAsset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OnwjAutomationcontrolAsset $onwjAutomationcontrolAsset)
    {
        //
    }

    public function showDatatable()
    {
        $model = OnwjAutomationcontrolAsset::query();

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
            ->rawColumns(['integritystatus'])
            ->make(true);
    }


    public function import(Request $request)
    {
        try {
            Excel::import(new AutomationcontrolImport, $request->file('file'));

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

        $areas = OnwjAutomationcontrolAsset::select('area')
            ->groupBy('area')
            ->orderBy('area')
            ->get();

        # Get integrity chart data for all areas
        $allAreas = [];
        $integrityPerAreas = OnwjAutomationcontrolAsset::select('integritystatus')
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
            $integrityPerAreas = OnwjAutomationcontrolAsset::select('area', 'integritystatus')
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

        $allAreaIntegrityResumes = OnwjAutomationcontrolAsset::select('integritystatus')
            ->selectRaw('COUNT(integritystatus) AS totalStatus')
            ->groupBy('integritystatus')
            ->get();

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
