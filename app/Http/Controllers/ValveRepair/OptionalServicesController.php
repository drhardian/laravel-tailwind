<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\ValveRepair\OptionalServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OptionalServicesController extends Controller
{

    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function storeOptionalServiceValvePreTest(Request $request)
    {
        DB::beginTransaction();

        try {
            if ($request->has('valvepretest_checkbox')) {
                $model = new OptionalServices();
                // Set the model's attributes based on the checkbox values
                $model->valvepretest_checkbox = $request->has('valvepretest_checkbox') ? 1 : 0;
                $model->repair_report_id = $request->input('repair_report_id');
                $model->scope_of_work_id = $request->input('scope_of_work_id');
                // Save the model to the database
                $model->save();
            } else {
                $data = $request->except('_token');
                $data['valvepretest_checkbox'] = 0; // Checkbox is not checked, set to false
                OptionalServices::create($data);
            }

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

    public  function getOptionalServiceValvePreTest(Request $request, $id)
    {

        try {

            $optionalservice = OptionalServices::where('repair_report_id',  $request->valverepair)
                ->where('scope_of_work_id', $id)
                ->first();
            if ($optionalservice) {
                return response()->json(
                    [
                        'data' => [
                            'valvepretest_checkbox' => $optionalservice->valvepretest_checkbox,
                            'vp_test_technician' => $optionalservice->vp_test_technician,
                            'vp_test_date' => $optionalservice->vp_test_date,
                            'vp_test_witnessed_by' => $optionalservice->vp_test_witnessed_by,
                            'vp_seak_leak_class' => $optionalservice->vp_seak_leak_class,
                            'vp_seat_test_pressure' => $optionalservice->vp_seat_test_pressure,
                            'vp_seat_test_pressure_uom' => $optionalservice->vp_seat_test_pressure_uom,
                            'vp_pressure_class' => $optionalservice->vp_pressure_class,
                            'vp_hydro_test_pressure' => $optionalservice->vp_hydro_test_pressure,
                            'vp_hydro_test_pressure_uom' => $optionalservice->vp_hydro_test_pressure_uom,
                            'vp_hydro_test_duration' => $optionalservice->vp_hydro_test_duration,
                            'vp_allowable_leakage' => $optionalservice->vp_allowable_leakage,
                            'vp_allowable_leakage_uom' => $optionalservice->vp_allowable_leakage_uom,
                            'vp_actual_leakage' => $optionalservice->vp_actual_leakage,
                            'vp_actual_leakage_uom' => $optionalservice->vp_actual_leakage_uom,
                            'vp_bc_note' => $optionalservice->vp_bc_note

                        ],
                        'update_url' => route('valverepair.optionalservices.update.valvepretest', ['optionalservice' => $optionalservice->id]),
                    ],
                    200,
                );
            } else {
                return response()->json(
                    [
                        'status' => 'empty',
                        'message' => 'Data not found. Please insert the data initially / No Data in Tab Body.',
                    ],
                    200,
                ); // You can use a different status code if appropriate
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json(
                [
                    'message' => 'The server encountered an error and could not complete your request',
                ],
                500,
            );
        }
    }

    public function updateOptionalServiceValvePreTest(Request $request, OptionalServices $optionalservice)
    {
        DB::beginTransaction();

        try {
            if ($request->has('valvepretest_checkbox')) {
                $data['valvepretest_checkbox'] = 1; // Checkbox is not checked, set to false
                $optionalservice->update($data);
            } else {
                $data = $request->except('_token');
                $data['valvepretest_checkbox'] = 0; // Checkbox is not checked, set to false
                $optionalservice->update($data);
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Table Body Construction successfully saved',
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
    public function getMaterialverification(Request $request, $scopeofworkid)
    {
        $OptionalServices = OptionalServices::where('repair_report_id', $request->consIsolValve)
            ->where('scope_of_work_id', $scopeofworkid)
            ->first();
        if ($OptionalServices) {
            return response()->json(
                [
                    'data' => [
                        'material_verification_checkbox' => $OptionalServices->material_verification_checkbox,
                        'mv_body_found' => $OptionalServices->mv_body_found,
                        'mv_pdb_found' => $OptionalServices->mv_pdb_found,
                        'mv_stem_shaft_found' => $OptionalServices->mv_stem_shaft_found,
                        'mv_cage_found' => $OptionalServices->mv_cage_found,
                        'mv_seat_found' => $OptionalServices->mv_seat_found,
                        'mv_bushing_found' => $OptionalServices->mv_bushing_found,
                        'mv_body_bonnet_found' => $OptionalServices->mv_body_bonnet_found,
                        'mv_gasket_found' => $OptionalServices->mv_gasket_found,
                        'mv_body_left' => $OptionalServices->mv_body_left,
                        'mv_pdb_left' => $OptionalServices->mv_pdb_left,
                        'mv_stem_shaft_left' => $OptionalServices->mv_stem_shaft_left,
                        'mv_cage_left' => $OptionalServices->mv_cage_left,
                        'mv_seat_left' => $OptionalServices->mv_seat_left,
                        'mv_bushing_left' => $OptionalServices->mv_bushing_left,
                        'mv_body_bonnet_left' => $OptionalServices->mv_body_bonnet_left,
                        'mv_gasket_left' => $OptionalServices->mv_gasket_left,
                        'mv_note' => $OptionalServices->mv_note,
                    ],
                    'update_url' => route('valverepair.optionalservices.update.materialverification', ['optionalservice' => $OptionalServices->id]),
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'status' => 'empty',
                    'message' => 'Data not found. Please insert the data initially / No Data in Tab Body.',
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }

    public function updateMaterialverification(Request $request, OptionalServices $optionalservice)
    {
        DB::beginTransaction();

        try {
            if ($request->has('material_verification_checkbox')) {
                $data['material_verification_checkbox'] = 1; // Checkbox is not checked, set to false
                $optionalservice->update($data);
            } else {
                $data = $request->except('_token');
                $data['material_verification_checkbox'] = 0; // Checkbox is not checked, set to false
                $optionalservice->update($data);
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Table Body Construction successfully saved',
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
}
