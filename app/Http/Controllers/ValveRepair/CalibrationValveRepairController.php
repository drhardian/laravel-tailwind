<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\ValveRepair\Calibration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CalibrationValveRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try {
            $data = $request->except('_token');
            Calibration::create($data);

            DB::commit();

            return response()->json(
                [
                    'message' => 'Table prefix successfully saved',
                ],
                200,
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(
                [
                    'message' => 'The server encountered an error and could not complete your request',
                ],
                500,
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calibration $calibration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getData(Request $request)
    {
        $calibration = Calibration::where('repair_report_id', $request->valveRepairid)
            ->where('scope_of_work_id', $request->scopeofworkid)
            ->first();
        if ($calibration) {

            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => [
                    'calibration_travel_found' => $calibration->calibration_travel_found,
                    'calibration_travel_uom_found' => $calibration->calibration_travel_uom_found,
                    'calibration_bench_set_found' => $calibration->calibration_bench_set_found,
                    'calibration_bench_set_uom_found' => $calibration->calibration_bench_set_uom_found,
                    'calibration_signal_open_found' => $calibration->calibration_signal_open_found,
                    'calibration_signal_open_uom_found' => $calibration->calibration_signal_open_uom_found,
                    'calibration_signal_close_found' => $calibration->calibration_signal_close_found,
                    'calibration_signal_close_uom_found' => $calibration->calibration_signal_close_uom_found,
                    'calibration_supply_found' => $calibration->calibration_supply_found,
                    'calibration_supply_uom_found' => $calibration->calibration_supply_uom_found,
                    'calibration_fail_action_found' => $calibration->calibration_fail_action_found,
                    'calibration_fail_action_uom_found' => $calibration->calibration_fail_action_uom_found,
                    'calibration_travel_left' => $calibration->calibration_travel_left,
                    'calibration_travel_uom_left' => $calibration->calibration_travel_uom_left,
                    'calibration_bench_set_left' => $calibration->calibration_bench_set_left,
                    'calibration_bench_set_uom_left' => $calibration->calibration_bench_set_uom_left,
                    'calibration_signal_open_left' => $calibration->calibration_signal_open_left,
                    'calibration_signal_open_uom_left' => $calibration->calibration_signal_open_uom_left,
                    'calibration_signal_close_left' => $calibration->calibration_signal_close_left,
                    'calibration_signal_close_uom_left' => $calibration->calibration_signal_close_uom_left,
                    'calibration_supply_left' => $calibration->calibration_supply_left,
                    'calibration_supply_uom_left' => $calibration->calibration_supply_uom_left,
                    'calibration_fail_action_left' => $calibration->calibration_fail_action_left,
                    'calibration_fail_action_uom_left' => $calibration->calibration_fail_action_uom_left,

                ],
                'url' => route('valverepair.calibration.update',['calibration' => $calibration->id])
            ],200);

        } else {
            // Data doesn't exist, return a message indicating the need for initial insertion
            return response()->json(
                [
                    'status' => true,
                    'datastatus' => 'empty',
                    'message' => 'Data not found. Please insert the data initially / No Data in Tab Body.',
                    'url' => route('valverepair.calibration.store')
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }
}
