<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\FileUpload;
use App\Models\ValveRepair\ConstructionIsolationValve;
use App\Models\ValveRepair\DeviceDetail;
use App\Models\ValveRepair\Ltsa;
use App\Models\ValveRepair\RepairReport;
use App\Models\ValveRepair\ValveRepairDropdown;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            'vrr_dropdown' => $vrr_dropdown,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('photo_devices'));

        $request->validate([
            'photo_devices.*' => 'image|mimes:jpeg,png,jpg|max:8048', // Use image.* to validate each file in a multi-upload field
        ]);

        // Retrieve the uploaded image file
        $imageFiles = $request->file('photo_devices');

        DB::beginTransaction();

        try {
            $repair_report = RepairReport::create($request->only('customer', 'contact_person', 'title', 'email_address', 'end_user', 'so_reference', 'project', 'work_type', 'order_type', 'scope_of_work', 'repair_type', 'performed_by', 'title_performed', 'email_address_performed', 'start_date', 'estimate_end_date', 'field_diagnostic_only_job', 'note'));
            // $repair_report = $repair_report->id;

            if ($repair_report->orderType->dropdown_label === 'LTSA') {
                Ltsa::create([
                    'ltsa_title' => $request->input('ltsa_title'),
                    'ltsa_ref' => $request->input('ltsa_ref'),
                    'ro_number' => $request->input('ro_number'),
                    'ro_date' => $request->input('ro_date'),
                    'ex_station_p_f' => $request->input('ex_station_p_f'),
                    'ltsa_project' => $request->input('ltsa_project'),
                    'ltsa_manager' => $request->input('ltsa_manager'),
                    'workshop_lead' => $request->input('workshop_lead'),
                    'engineering_lead' => $request->input('engineering_lead'),
                    'qc_inspector' => $request->input('qc_inspector'),
                    'painting_operator' => $request->input('painting_operator'),
                    'ndt_level' => $request->input('ndt_level'),
                    'other_ptcs_personel' => $request->input('other_ptcs_personel'),
                    'qc_representative' => $request->input('qc_representative'),
                    'other_customer_personel' => $request->input('other_customer_personel'),
                    'repair_report_id' => $repair_report->id, // Inject the repair_report_id
                ]);
            }

            $device_detail = DeviceDetail::create([
                'repair_report_id' => $repair_report->id,
                'device_type' => $request->input('device_type'),
                'device_type_selected_type' => $request->input('selected_device_type'),
                'tag_number' => $request->input('tag_number'),
                'serial_number' => $request->input('serial_number'),
                'process' => $request->input('process'),
            ]);

            $path = 'images/ValveRepair/' . $repair_report->id; // Folder within the storage directory where you want to store the files
            if ($imageFiles) {
                foreach ($imageFiles as $key => $value) {
                    // Generate a unique filename for each uploaded file
                    $filename = time() . '_' . $value->getClientOriginalName();
                    // Store the file in the specified folder
                    $value->storeAs($path, $filename);
                    // If you want to get the full path to the stored file, you can use Storage::url
                    $fullPath = Storage::url("$path/$filename");
                    $nameFileSpaces = preg_replace('/\s/', '', $value->getClientOriginalName());
                    // $fileNameWithoutExtension = preg_replace('/\.[^/.]+$/', '', $nameFileSpaces);
                    $fileNameWithoutExtension = pathinfo($nameFileSpaces, PATHINFO_FILENAME);
                    // dd($fileNameWithoutExtension);

                    $file_type = $value->getClientOriginalExtension();
                    $size = $this->fileSize($value);
                    $fileUpload = FileUpload::create([
                        'reference_id' => $repair_report->id,
                        'name' => $filename,
                        'path' => $fullPath,
                        'size' => $size,
                        'type' => $file_type,
                        'prefix' => 'valve_repair',
                        'description' =>  $request->input('input-image-item-' . $fileNameWithoutExtension),
                    ]);
                }
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Table Repair Report successfully saved',
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
    public function show(RepairReport $valverepair)
    {

        $breadcrumbs = [
            [
                'title' => 'Valve Repair Report',
                'status' => 'active',
                'url' => route('valverepair.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'Show',
                'status' => 'active',
                'url' => '',
                'icon' => '',
            ],
        ];

        $vrr_dropdown = ValveRepairDropdown::all();
        return view('Valve_repair.show', [
            'title' => $this->pageTitle,
            'breadcrumbs' => $breadcrumbs,
            'vrr_dropdown' => $vrr_dropdown,
            'valverepair' => $valverepair,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RepairReport $valverepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RepairReport $valverepair)
    {
        $request->validate([
            'photo_devices.*' => 'image|mimes:jpeg,png,jpg|max:8048', // Use image.* to validate each file in a multi-upload field
        ]);

        // Retrieve the uploaded image file
        $imageFiles = $request->file('photo_devices');

        DB::beginTransaction();

        try {
            $repair_report = $valverepair->update($request->only('customer', 'contact_person', 'title', 'email_address', 'end_user', 'so_reference', 'project', 'work_type', 'order_type', 'scope_of_work', 'repair_type', 'performed_by', 'title_performed', 'email_address_performed', 'start_date', 'estimate_end_date', 'field_diagnostic_only_job', 'note'));
            // $repair_report = $repair_report->id;
            $ltsaData = Ltsa::select('id')->where('repair_report_id', $valverepair->id)
                ->first();
            if ($valverepair->orderType->dropdown_label === 'LTSA') {
                $ltsaData->update([
                    'ltsa_title' => $request->input('ltsa_title'),
                    'ltsa_ref' => $request->input('ltsa_ref'),
                    'ro_number' => $request->input('ro_number'),
                    'ro_date' => $request->input('ro_date'),
                    'ex_station_p_f' => $request->input('ex_station_p_f'),
                    'ltsa_project' => $request->input('ltsa_project'),
                    'ltsa_manager' => $request->input('ltsa_manager'),
                    'workshop_lead' => $request->input('workshop_lead'),
                    'engineering_lead' => $request->input('engineering_lead'),
                    'qc_inspector' => $request->input('qc_inspector'),
                    'painting_operator' => $request->input('painting_operator'),
                    'ndt_level' => $request->input('ndt_level'),
                    'other_ptcs_personel' => $request->input('other_ptcs_personel'),
                    'qc_representative' => $request->input('qc_representative'),
                    'other_customer_personel' => $request->input('other_customer_personel'),
                    'repair_report_id' => $valverepair->id, // Inject the repair_report_id
                ]);
            }
            $deviceDetail = DeviceDetail::select('id')->where('repair_report_id', $valverepair->id)
                ->first();

            $device_detail = $deviceDetail->update([
                'repair_report_id' => $valverepair->id,
                'device_type' => $request->input('device_type'),
                'device_type_selected_type' => $request->input('selected_device_type'),
                'tag_number' => $request->input('tag_number'),
                'serial_number' => $request->input('serial_number'),
                'process' => $request->input('process'),
            ]);

            $path = 'images/ValveRepair/' . $valverepair->id; // Folder within the storage directory where you want to store the files
            if ($imageFiles) {
                foreach ($imageFiles as $key => $value) {
                    // Generate a unique filename for each uploaded file
                    $filename = time() . '_' . $value->getClientOriginalName();
                    // Store the file in the specified folder
                    $value->storeAs($path, $filename);
                    // If you want to get the full path to the stored file, you can use Storage::url
                    $fullPath = Storage::url("$path/$filename");
                    $nameFileSpaces = preg_replace('/\s/', '', $value->getClientOriginalName());
                    // $fileNameWithoutExtension = preg_replace('/\.[^/.]+$/', '', $nameFileSpaces);
                    $fileNameWithoutExtension = pathinfo($nameFileSpaces, PATHINFO_FILENAME);
                    // dd($fileNameWithoutExtension);

                    $file_type = $value->getClientOriginalExtension();
                    $size = $this->fileSize($value);
                    $fileUpload = FileUpload::create([
                        'reference_id' => $valverepair->id,
                        'name' => $filename,
                        'path' => $fullPath,
                        'size' => $size,
                        'type' => $file_type,
                        'prefix' => 'valve_repair',
                        'description' =>  $request->input('input-image-item-' . $fileNameWithoutExtension),
                    ]);
                }
            }

            DB::commit();

            return response()->json(
                [
                    'message' => 'Table Repair Report successfully Updated',
                    'action' => 'update',

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
     * Remove the specified resource from storage.
     */
    public function destroy(RepairReport $valverepair)
    {
        //
    }

    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = [' bytes', ' KB', ' MB', ' GB', ' TB'];
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
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

            return response()->json([
                'message' => 'Table prefix successfully saved'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # showing existing detail data on edit form
    public function editConstructionBody(Request $request, $id)
    {

        $consIsolValve = ConstructionIsolationValve::where('repair_report_id', $id)->first();
        return response()->json([
            'form' => [
                $consIsolValve
                // 'id' => $consIsolValve->id,
                // 'repair_report_id' => $consIsolValve->repair_report_id,
                // 'bc_checkbox' => $consIsolValve->bc_checkbox,
                // 'bc_brand_found' => $consIsolValve->bc_brand_found,
                // 'bc_model_found' => $consIsolValve->bc_model_found,
                // 'bc_serial_number_found' => $consIsolValve->bc_serial_number_found,
                // 'bc_type_found' => $consIsolValve->bc_type_found,
                // 'bc_size_found' => $consIsolValve->bc_size_found,
                // 'bc_port_found' => $consIsolValve->bc_port_found,
                // 'bc_pressure_class_found' => $consIsolValve->bc_pressure_class_found,
                // 'bc_end_connection_found' => $consIsolValve->bc_end_connection_found,
                // 'bc_bonnet_style_found' => $consIsolValve->bc_bonnet_style_found,
                // 'bc_packing_configuration_found' => $consIsolValve->bc_packing_configuration_found,
                // 'bc_live_loaded_found' => $consIsolValve->bc_live_loaded_found,
                // 'bc_body_material_found' => $consIsolValve->bc_body_material_found,
                // 'bc_pdb_material_found' => $consIsolValve->bc_pdb_material_found,
                // 'bc_steam_shaft_material_found' => $consIsolValve->bc_steam_shaft_material_found,
                // 'bc_seat_material_found' => $consIsolValve->bc_seat_material_found,
                // 'bc_brand_left' => $consIsolValve->bc_brand_left,
                // 'bc_model_left' => $consIsolValve->bc_model_left,
                // 'bc_serial_number_left' => $consIsolValve->bc_serial_number_left,
                // 'bc_type_left' => $consIsolValve->bc_type_left,
                // 'bc_size_left' => $consIsolValve->bc_size_left,
                // 'bc_port_left' => $consIsolValve->bc_port_left,
                // 'bc_pressure_class_left' => $consIsolValve->bc_pressure_class_left,
                // 'bc_end_connection_left' => $consIsolValve->bc_end_connection_left,
                // 'bc_bonnet_style_left' => $consIsolValve->bc_bonnet_style_left,
                // 'bc_packing_configuration_left' => $consIsolValve->bc_packing_configuration_left,
                // 'bc_live_loaded_left' => $consIsolValve->bc_live_loaded_left,
                // 'bc_body_material_left' => $consIsolValve->bc_body_material_left,
                // 'bc_pdb_material_left' => $consIsolValve->bc_pdb_material_left,
                // 'bc_steam_shaft_material_left' => $consIsolValve->bc_steam_shaft_material_left,
                // 'bc_seat_material_left' => $consIsolValve->bc_seat_material_left,
                // 'bc_note' => $consIsolValve->bc_note,
                // 'created_at' => $consIsolValve->created_at,
                // 'updated_at' => $consIsolValve->updated_at,

            ],
            'update_url' => route('valverepair.update.constructionbody', ['id' => $consIsolValve->id])
        ], 200);
    }
}
