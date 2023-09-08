<?php

namespace App\Http\Controllers\ValveRepair;

use App\Http\Controllers\Controller;
use App\Models\FileUpload;
use App\Models\ValveRepair\DeviceDetail;
use App\Models\ValveRepair\Ltsa;
use App\Models\ValveRepair\RepairReport;
use App\Models\ValveRepair\ValveRepairDropdown;
use Illuminate\Http\Request;
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
                        'description' =>  $request->input('input-image-item-'.$fileNameWithoutExtension),
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
        //
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
}
