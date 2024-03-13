<?php

namespace App\Http\Controllers;

use App\Imports\FiregasDataImport;
use App\Models\FiregasAsset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
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
                'url' => 'dashboard',
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
        // try {
            Excel::import(new FiregasDataImport, $request->file('file'));

            return response()->json([
                'message' => 'Data imported successfully'
            ], 200);
        // } catch (ParseError $e) {
        //     Log::error($e->getMessage());

        //     return response()->json([
        //         'message' => $e->getMessage()
        //     ], 500);
        // } catch (Exception $e) {
        //     Log::error($e->getMessage());

        //     return response()->json([
        //         'message' => $e->getMessage()
        //     ], 500);
        // }
    }
}
