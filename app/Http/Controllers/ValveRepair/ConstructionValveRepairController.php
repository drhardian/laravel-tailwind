<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\ValveRepair\ConstructionAccessory;
use App\Models\ValveRepair\ConstructionIsolationValve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConstructionValveRepairController extends Controller
{
    # showing existing detail data on edit form
    public function editConstructionBody(Request $request, $id)
    {
        $scopeofworkid = $request->query('scopeofworkid');

        $consIsolValve = ConstructionIsolationValve::where('repair_report_id', $id)
            ->where('scope_of_work_id', $scopeofworkid)
            ->first();
        if ($consIsolValve) {
            // Get all the attributes as an associative array
            $dataAttributes = $consIsolValve->getAttributes();

            // Filter attributes that start with 'ahc_'
            $filteredAttributes = collect($dataAttributes)
                ->filter(function ($value, $key) {
                    return strpos($key, 'bc_') === 0;
                })
                ->all();

            // Create a new object with the filtered attributes
            $filteredConsIsolValveData = new ConstructionIsolationValve();
            $filteredConsIsolValveData->setRawAttributes($filteredAttributes);

            return response()->json(
                [
                    'form' => [$filteredConsIsolValveData],
                    'is_change' => $consIsolValve->construction_change,
                    'update_url' => route('valverepair.scopeofwork.update.constructionbody', ['consIsolValve' => $consIsolValve->id]),
                ],
                200,
            );
        } else {
            // Data doesn't exist, return a message indicating the need for initial insertion
            return response()->json(
                [
                    'status' => 'empty',
                    'message' => 'Data not found. Please insert the data initially / No Data in Tab Body.',
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }

    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function storeConstructionBody(Request $request)
    {
        DB::beginTransaction();

        try {
            if ($request->has('bc_checkbox')) {
                $model = new ConstructionIsolationValve();
                // Set the model's attributes based on the checkbox values
                $model->bc_checkbox = $request->has('bc_checkbox') ? 1 : 0;
                $model->repair_report_id = $request->input('repair_report_id');
                // Save the model to the database
                $model->save();
            } else {
                $data = $request->except('_token');
                $data['bc_checkbox'] = 0; // Checkbox is not checked, set to false
                ConstructionIsolationValve::create($data);
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

    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function updateConstructionBody(Request $request, ConstructionIsolationValve $consIsolValve)
    {
        DB::beginTransaction();

        try {
            if ($request->has('bc_checkbox')) {
                $data['bc_checkbox'] = 1; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            } else {
                $data = $request->except('_token');
                $data['bc_checkbox'] = 0; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
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
    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function storeConstructionActuatorWheel(Request $request, ConstructionIsolationValve $consIsolValve)
    {
        DB::beginTransaction();

        try {
            if ($request->has('ahc_checkbox')) {
                $data['ahc_checkbox'] = 1; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            } else {
                $data = $request->except('_token');
                $data['ahc_checkbox'] = 0; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Data Actuator Wheel successfully saved',
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

    # showing existing detail data on edit form
    public function editConstructionActuatorWheel(Request $request, $consIsolValve)
    {
        $scopeofworkid = $request->query('scopeofworkid');
        $consIsolValveData = ConstructionIsolationValve::where('repair_report_id', $consIsolValve)
            ->where('scope_of_work_id', $scopeofworkid)
            ->first();

        if ($consIsolValveData) {
            // Get all the attributes as an associative array
            $dataAttributes = $consIsolValveData->getAttributes();

            // Filter attributes that start with 'ahc_'
            $filteredAttributes = collect($dataAttributes)
                ->filter(function ($value, $key) {
                    return strpos($key, 'ahc_') === 0;
                })
                ->all();

            // Create a new object with the filtered attributes
            $filteredConsIsolValveData = new ConstructionIsolationValve();
            $filteredConsIsolValveData->setRawAttributes($filteredAttributes);

            // Now $filteredConsIsolValveData contains only the attributes with names starting with 'ahc_'
            return response()->json(
                [
                    'form' => [$filteredConsIsolValveData],
                    'is_change' => $consIsolValveData->construction_change,
                    'update_url' => route('valverepair.scopeofwork.store.constructionactuatorwheel', ['consIsolValve' => $consIsolValveData->id]),
                ],
                200,
            );
        } else {
            // Data doesn't exist, return a message indicating the need for initial insertion
            return response()->json(
                [
                    'status' => 'empty',
                    'message' => 'Data not found. Please insert the data first In tab Body.',
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }

    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function storeConstructionActuatorAutomation(Request $request, ConstructionIsolationValve $consIsolValve)
    {
        DB::beginTransaction();

        try {
            if ($request->has('aa_checkbox')) {
                $data['aa_checkbox'] = 1; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            } else {
                $data = $request->except('_token');
                $data['aa_checkbox'] = 0; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Data Actuator Wheel successfully saved',
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

    # showing existing detail data on edit form
    public function editConstructionActuatorAutomation(Request $request, $consIsolValve)
    {
        $scopeofworkid = $request->query('scopeofworkid');
        $consIsolValveData = ConstructionIsolationValve::where('repair_report_id', $consIsolValve)
            ->where('scope_of_work_id', $scopeofworkid)
            ->first();

        if ($consIsolValveData) {
            // Get all the attributes as an associative array
            $dataAttributes = $consIsolValveData->getAttributes();

            // Filter attributes that start with 'ahc_'
            $filteredAttributes = collect($dataAttributes)
                ->filter(function ($value, $key) {
                    return strpos($key, 'aa_') === 0;
                })
                ->all();

            // Create a new object with the filtered attributes
            $filteredConsIsolValveData = new ConstructionIsolationValve();
            $filteredConsIsolValveData->setRawAttributes($filteredAttributes);

            // Now $filteredConsIsolValveData contains only the attributes with names starting with 'ahc_'
            return response()->json(
                [
                    'form' => [$filteredConsIsolValveData],
                    'is_change' => $consIsolValveData->construction_change,
                    'update_url' => route('valverepair.scopeofwork.store.constructionactuatorautomation', ['consIsolValve' => $consIsolValveData->id]),
                ],
                200,
            );
        } else {
            // Data doesn't exist, return a message indicating the need for initial insertion
            return response()->json(
                [
                    'status' => 'empty',
                    'message' => 'Data not found. Please insert the data first In tab Body.',
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }

    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function storeConstructionPositionerIsolation(Request $request, ConstructionIsolationValve $consIsolValve)
    {
        DB::beginTransaction();

        try {
            if ($request->has('pc_checkbox')) {
                $data['pc_checkbox'] = 1; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            } else {
                $data = $request->except('_token');
                $data['pc_checkbox'] = 0; // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Data Actuator Wheel successfully saved',
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

    # showing existing detail data on edit form
    public function editConstructionPositionerIsolation(Request $request, $consIsolValve)
    {
        $scopeofworkid = $request->query('scopeofworkid');
        $consIsolValveData = ConstructionIsolationValve::where('repair_report_id', $consIsolValve)
            ->where('scope_of_work_id', $scopeofworkid)
            ->first();

        if ($consIsolValveData) {
            // Get all the attributes as an associative array
            $dataAttributes = $consIsolValveData->getAttributes();

            // Filter attributes that start with 'ahc_'
            $filteredAttributes = collect($dataAttributes)
                ->filter(function ($value, $key) {
                    return strpos($key, 'pc_') === 0;
                })
                ->all();

            // Create a new object with the filtered attributes
            $filteredConsIsolValveData = new ConstructionIsolationValve();
            $filteredConsIsolValveData->setRawAttributes($filteredAttributes);

            // Now $filteredConsIsolValveData contains only the attributes with names starting with 'ahc_'
            return response()->json(
                [
                    'form' => [$filteredConsIsolValveData],
                    'is_change' => $consIsolValveData->construction_change,
                    'update_url' => route('valverepair.scopeofwork.store.constructionpositionerisolation', ['consIsolValve' => $consIsolValveData->id]),
                ],
                200,
            );
        } else {
            // Data doesn't exist, return a message indicating the need for initial insertion
            return response()->json(
                [
                    'status' => 'empty',
                    'message' => 'Data not found. Please insert the data first In tab Body.',
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }

    /**
     * storeConstructionBody a newly created resource in storage.
     */
    public function storeConstructionAccessoriesIsolation(Request $request, ConstructionIsolationValve $consIsolValve)
    {
        DB::beginTransaction();

        try {
            if ($request->has('ac_checkbox')) {
                $data['ac_checkbox'] = 1; // Checkbox is not checked, set to false
                $data['construction_change'] = $request->input('construction_change_radio'); // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            } else {
                $data = $request->except('_token', 'construction_change_radio', 'ac_selected_found', 'ac_selected_left');
                $data['ac_checkbox'] = 0; // Checkbox is not checked, set to false
                $data['construction_change'] = $request->input('construction_change_radio'); // Checkbox is not checked, set to false
                $consIsolValve->update($data);
            }

            $ac_selected_found = $request->input('ac_selected_found');
            $ac_selected_left = $request->input('ac_selected_left');
            // Loop through the selected accessories and save them to the database

            // Get the existing accessories for this construction
            $existingAccessories = ConstructionAccessory::where('construction_id', $consIsolValve->id)->get();

            // Create arrays to store the IDs of selected accessories
            $selectedFoundIds = [];
            $selectedLeftIds = [];

            if ($ac_selected_found) {
                $selectedFoundIds = $ac_selected_found;
            }

            if ($ac_selected_left) {
                $selectedLeftIds = $ac_selected_left;
            }

            // Loop through existing accessories and delete those not in the selected lists
            foreach ($existingAccessories as $existingAccessory) {
                if (!in_array($existingAccessory->ac_accessories_id, $selectedFoundIds) && $existingAccessory->ac_accessories_as === 'found') {
                    $existingAccessory->delete();
                }

                if (!in_array($existingAccessory->ac_accessories_id, $selectedLeftIds) && $existingAccessory->ac_accessories_as === 'left') {
                    $existingAccessory->delete();
                }
            }

            if ($ac_selected_found) {
                foreach ($ac_selected_found as $accessory) {
                    ConstructionAccessory::updateOrCreate(
                        [
                            'construction_id' => $consIsolValve->id,
                            'ac_accessories_id' => $accessory,
                            'ac_accessories_as' => 'found',
                        ],
                        [
                            'construction_id' => $consIsolValve->id,
                            'ac_accessories_id' => $accessory,
                            'ac_accessories_as' => 'found',
                        ],
                    );
                }
            }

            if ($ac_selected_left) {
                foreach ($ac_selected_left as $accessory) {
                    ConstructionAccessory::updateOrCreate(
                        [
                            'construction_id' => $consIsolValve->id,
                            'ac_accessories_id' => $accessory,
                            'ac_accessories_as' => 'left',
                        ],
                        [
                            'construction_id' => $consIsolValve->id,
                            'ac_accessories_id' => $accessory,
                            'ac_accessories_as' => 'left',
                        ],
                    );
                }
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Data Accessories successfully saved',
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

    # showing existing detail data on edit form
    public function editConstructionAccessoriesIsolation(Request $request, $consIsolValve)
    {
        $scopeofworkid = $request->query('scopeofworkid');
        $consIsolValveData = ConstructionIsolationValve::where('repair_report_id', $consIsolValve)
            ->where('scope_of_work_id', $scopeofworkid)
            ->first();

        if ($consIsolValveData) {
            $selectedAccessoriesFound = ConstructionAccessory::where('construction_id', $consIsolValveData->id)
                ->where('ac_accessories_as', 'found')
                ->pluck('ac_accessories_id')
                ->toArray();

            $selectedAccessoriesLeft = ConstructionAccessory::where('construction_id', $consIsolValveData->id)
                ->where('ac_accessories_as', 'left')
                ->pluck('ac_accessories_id')
                ->toArray();
            // Get all the attributes as an associative array
            $dataAttributes = $consIsolValveData->getAttributes();
            // Filter attributes that start with 'ahc_'
            $filteredAttributes = collect($dataAttributes)
                ->filter(function ($value, $key) {
                    $desiredKeys = ['ac_checkbox', 'ac_note', 'construction_change'];
                    return in_array($key, $desiredKeys);
                })
                ->all();

            // Create a new object with the filtered attributes
            $filteredConsIsolValveData = new ConstructionIsolationValve();
            $filteredConsIsolValveData->setRawAttributes($filteredAttributes);

            $accessoriesdata = [
                'selectedValueFound' => $selectedAccessoriesFound,
                'selectedValueLeft' => $selectedAccessoriesLeft,
                'filteredAccesorie' => $filteredConsIsolValveData,
            ];

            return response()->json(
                [
                    'form' => [$accessoriesdata],
                    'is_change' => $consIsolValveData->construction_change,
                    'update_url' => route('valverepair.scopeofwork.store.constructionaccesoriesisolation', ['consIsolValve' => $consIsolValveData->id]),
                ],
                200,
            );
        } else {
            // Data doesn't exist, return a message indicating the need for initial insertion
            return response()->json(
                [
                    'status' => 'empty',
                    'message' => 'Data not found. Please insert the data first In tab Body.',
                ],
                200,
            ); // You can use a different status code if appropriate
        }
    }
}
