<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\ValveRepair\RepairReport;
use App\Models\ValveRepair\ValveRepairDropdown;
use Illuminate\Http\Request;

class RepairReportController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Valve Repair Report';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Valve Repair Report',
                'status' => 'active',
                'url' => 'valverepair',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
        ];

        $vrr_dropdown = ValveRepairDropdown::all();

        return view('Valve_repair.index', [
            'title' => $this->pageTitle,
            'breadcrumbs' => $breadcrumbs,
            'vrr_dropdown' => $vrr_dropdown

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
    public function show(RepairReport $repairReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RepairReport $repairReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RepairReport $repairReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RepairReport $repairReport)
    {
        //
    }
}
