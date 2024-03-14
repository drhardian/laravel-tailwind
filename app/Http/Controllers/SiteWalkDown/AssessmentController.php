<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteWalkDown\AssessmentStoreRequest;
use App\Interfaces\AreaRepositoryInterface;
use App\Interfaces\AssessmentImageRepositoryInterface;
use App\Interfaces\CompanyPeopleRepositoryInterface;
use App\Interfaces\DeviceTypeRepositoryInterface;
use App\Interfaces\HealthRatingRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Interfaces\OtherAreaRepositoryInterface;
use App\Models\SiteWalkDown\Area;
use App\Models\SiteWalkDown\Assessment;
use App\Models\SiteWalkDown\AssessmentImage;
use App\Models\SiteWalkDown\CkvAssessment;
use App\Models\SiteWalkDown\CkvProduct;
use App\Models\SiteWalkDown\CompanyPerson;
use App\Models\SiteWalkDown\CovAssessment;
use App\Models\SiteWalkDown\CovProduct;
use App\Models\SiteWalkDown\Instruction;
use App\Models\SiteWalkDown\InstructionOtherarea;
use App\Models\SiteWalkDown\IsvAssessment;
use App\Models\SiteWalkDown\IsvProduct;
use App\Models\SiteWalkDown\MavAssessment;
use App\Models\SiteWalkDown\MavProduct;
use App\Models\SiteWalkDown\Product;
use App\Models\SiteWalkDown\PrvAssessment;
use App\Models\SiteWalkDown\PrvProduct;
use App\Models\SiteWalkDown\RegAssessment;
use App\Models\SiteWalkDown\RegProduct;
use App\Models\SiteWalkDown\TnkAssessment;
use App\Models\SiteWalkDown\TnkProduct;
use App\Models\SiteWalkDown\ValveConditionSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AssessmentController extends Controller
{
    private DeviceTypeRepositoryInterface $deviceTypeRepository;
    private AreaRepositoryInterface $areaRepository;
    private OtherAreaRepositoryInterface $otherAreaRepository;
    private CompanyPeopleRepositoryInterface $companyPeopleRepository;
    private HealthRatingRepositoryInterface $healthRatingRepository;
    private ImageRepositoryInterface $imageRepository;
    private AssessmentImageRepositoryInterface $assessmentImageRepository;

    public function __construct(
        DeviceTypeRepositoryInterface $deviceTypeRepository,
        AreaRepositoryInterface $areaRepository,
        OtherAreaRepositoryInterface $otherAreaRepository,
        CompanyPeopleRepositoryInterface $companyPeopleRepository,
        HealthRatingRepositoryInterface $healthRatingRepository,
        ImageRepositoryInterface $imageRepository,
        AssessmentImageRepositoryInterface $assessmentImageRepository,
    )
    {
        $this->deviceTypeRepository = $deviceTypeRepository;
        $this->areaRepository = $areaRepository;
        $this->otherAreaRepository = $otherAreaRepository;
        $this->companyPeopleRepository = $companyPeopleRepository;
        $this->healthRatingRepository = $healthRatingRepository;
        $this->imageRepository = $imageRepository;
        $this->assessmentImageRepository = $assessmentImageRepository;
    }

    # Display a listing of the resource.
    public function index()
    {
        abort_unless(Gate::allows('assessment_access'), 403);

        $attributes = (object)[
            'title' => 'Site Walkdown',
            'breadcrumb' => (object)[
                (object)[ 'title' => 'Dashboard', 'status' => '', 'previousUrl' => '/' ],
                (object)[ 'title' => 'Site Walkdown', 'status' => 'active', 'previousUrl' => '' ]
            ]
        ];

        session()->forget([
            'healthLevelSession',
            'health_rating_id',
            'health_level_color',
            'priority_rating_id',
        ]);

        return view('assessment.index', compact('attributes'));
    }

    # Show the form for creating a new resource.
    public function create()
    {
        abort_unless(Gate::allows('assessment_create'), 403);

        $attributes = (object)[
            'title' => 'Site Walkdown',
            'breadcrumb' => (object)[
                (object)[ 'title' => 'Dashboard', 'status' => '', 'previousUrl' => '/' ],
                (object)[ 'title' => 'Site Walkdown', 'status' => '', 'previousUrl' => route('assessments.index') ],
                (object)[ 'title' => 'New', 'status' => 'active', 'previousUrl' => '' ]
            ]
        ];

        $instructionId = request('id');

        $instruction = Instruction::with('company:id,name','area:id,title')->find($instructionId);

        $dateActivity = [
            'minDate' => Carbon::parse($instruction->date_activity_start)->format('d/m/Y'),
            'maxDate' => Carbon::parse($instruction->date_activity_end)->format('d/m/Y')
        ];

        $getArea = Area::select('title')->find($instruction->area_id);

        $otherarea = [];
        $otherAreas = InstructionOtherarea::with('otherarea:id,title')->where('instruction_id', $instruction->id)->get();
        foreach ($otherAreas as $value) {
            $otherarea[] = array($value->otherarea_id => $value->otherarea->title);
        }

        $selectBoxData = [
            'area_sbx' => array($instruction->area_id => $getArea->title),
            'otherarea_sbx' => $otherarea
        ];

        $assessmentId = (string) Str::uuid();

        session()->forget([
            'healthLevelSession',
            'health_rating_id',
            'health_level_color',
            'priority_rating_id',
        ]);

        return view('assessment.create', compact('attributes','instruction','dateActivity','selectBoxData','assessmentId'));
    }

    # Store a newly created resource in storage.
    public function store(AssessmentStoreRequest $request)
    {
        abort_unless(Gate::allows('assessment_create'), 403);

        DB::beginTransaction();

        try {
            /* get device type alias, such as PRV, MOV, etc */
            $deviceType = $this->deviceTypeRepository->getDeviceTypeById($request->device_type_id);

            /* insert new product */
            $newProduct = Product::updateOrCreate(
                [ 'id' => $request->productid ],
                array_merge(
                    [
                        'otherareas' => implode(",", $request->area_others),
                        'health_rating_id' => session('health_rating_id'),
                        'health_level_color' => session('health_level_color'),
                        'priority_rating_id' => session('priority_rating_id'),
                    ],
                    $request->only(
                        'device_type_id',
                        'criticality_level_id',
                        'tagnum',
                        'serial_number',
                        'application',
                        'name_plate',
                        'body_mfc',
                        'body_sn',
                        'body_model',
                        'body_material',
                        'body_size',
                        'class_rating',
                        'manual_override',
                        'end_connection',
                        'company_id',
                        'area_id',
                    )
                )
            );

            if(count($request->persons_name) > 0) {
                $responsible_people = [];
                $personKey = 0;

                while ($personKey < count($request->persons_name)) {
                    if($request->persons_name[$personKey] !== null || !empty($request->persons_name[$personKey])) {
                        $companyPerson = CompanyPerson::create([
                            'company_id' => $request->company_id,
                            'name' => $request->persons_name[$personKey],
                            'title' => $request->persons_title[$personKey],
                            'email' => $request->persons_email[$personKey],
                        ]);

                        $responsible_people[] = $companyPerson->id;
                    }

                    $personKey++;
                }
            } else {
                $responsible_people = [];
            }

            # insert new assessment
            $newAssessment = Assessment::create(array_merge(
                [
                    'product_id' => $newProduct->id,
                    'otherareas' => implode(",", $request->area_others),
                    'health_rating_id' => session('health_rating_id'),
                    'health_level_color' => session('health_level_color'),
                    'priority_rating_id' => session('priority_rating_id'),
                    'inspected_by' => Auth::user()->username,
                    'voc_leak_report_path' => '',
                    'assessment_record_status' => $request->recordStatus,
                    'responsible_people' => implode(",", $responsible_people)
                ],
                $request->only(
                    'id',
                    'instruction_id',
                    'device_type_id',
                    'criticality_level_id',
                    'company_id',
                    'location_type_id',
                    'location_detail_id',
                    'activity_date',
                    'serial_number',
                    'application',
                    'final_recommendation',
                    'rigging_point_needed',
                    'rigging_point_available',
                    'scaffolding_required',
                    'leak_detection_method',
                    'value_a',
                    'value_b',
                    'value_c',
                    'value_d',
                    'passing_detection_result',
                    'leak_out_value',
                    'leak_out_result',
                    'voc_leak_value',
                    'area_id',
                )
            ));

            # check selected device type
            switch ($deviceType) {
                case 'COV':
                    # insert new control valve detail product
                    CovProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'insulation',
                            'leakage_class',
                            'flow_direction',
                            'actuator_mfc',
                            'actuator_sn',
                            'actuator_model',
                            'actuator_size',
                            'fail_position',
                            'gear_mfc',
                            'gear_model',
                            'gear_size',
                            'positioner_mfc',
                            'positioner_sn',
                            'positioner_model',
                            'communication_protocol',
                            'instrument_acc',
                            'instrument_acc_sn',
                            'info_rating',
                            'info_plug',
                            'info_stem',
                            'info_body',
                            'info_seat',
                            'facetoface_dimension',
                        ))
                    );

                    # insert new control valve assessment
                    CovAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'packing_condition' => $request->valve_condition_1,
                        'packing_condition_level' => $request->health_rating_1,
                        'packing_cause' => implode("|",$request->potensial_cause_1),
                        'packing_recommendation' => implode("|",$request->recommendation_1),
                        'bonnet_condition' => $request->valve_condition_2,
                        'bonnet_condition_level' => $request->health_rating_2,
                        'bonnet_cause' => implode("|",$request->potensial_cause_2),
                        'bonnet_recommendation' => implode("|",$request->recommendation_2),
                        'bonnetgasket_condition' => $request->valve_condition_3,
                        'bonnetgasket_condition_level' => $request->health_rating_3,
                        'bonnetgasket_cause' => implode("|",$request->potensial_cause_3),
                        'bonnetgasket_recommendation' => implode("|",$request->recommendation_3),
                        'valvebody_condition' => $request->valve_condition_4,
                        'valvebody_condition_level' => $request->health_rating_4,
                        'valvebody_cause' => implode("|",$request->potensial_cause_4),
                        'valvebody_recommendation' => implode("|",$request->recommendation_4),
                        'valvetrim_condition' => $request->valve_condition_5,
                        'valvetrim_condition_level' => $request->health_rating_5,
                        'valvetrim_cause' => implode("|",$request->potensial_cause_5),
                        'valvetrim_recommendation' => implode("|",$request->recommendation_5),
                        'boltnut_condition' => $request->valve_condition_6,
                        'boltnut_condition_level' => $request->health_rating_6,
                        'boltnut_cause' => implode("|",$request->potensial_cause_6),
                        'boltnut_recommendation' => implode("|",$request->recommendation_6),
                        'actexternal_condition' => $request->valve_condition_7,
                        'actexternal_condition_level' => $request->health_rating_7,
                        'actexternal_cause' => implode("|",$request->potensial_cause_7),
                        'actexternal_recommendation' => implode("|",$request->recommendation_7),
                        'electricenclosure_condition' => $request->valve_condition_8,
                        'electricenclosure_condition_level' => $request->health_rating_8,
                        'electricenclosure_cause' => implode("|",$request->potensial_cause_8),
                        'electricenclosure_recommendation' => implode("|",$request->recommendation_8),
                        'seal_condition' => $request->valve_condition_9,
                        'seal_condition_level' => $request->health_rating_9,
                        'seal_cause' => implode("|",$request->potensial_cause_9),
                        'seal_recommendation' => implode("|",$request->recommendation_9),
                        'gearbox_condition' => $request->valve_condition_10,
                        'gearbox_condition_level' => $request->health_rating_10,
                        'gearbox_cause' => implode("|",$request->potensial_cause_10),
                        'gearbox_recommendation' => implode("|",$request->recommendation_10),
                        'manualoverride_condition' => $request->valve_condition_11,
                        'manualoverride_condition_level' => $request->health_rating_11,
                        'manualoverride_cause' => implode("|",$request->potensial_cause_11),
                        'manualoverride_recommendation' => implode("|",$request->recommendation_11),
                        'positioneracc_condition' => $request->valve_condition_12,
                        'positioneracc_condition_level' => $request->health_rating_12,
                        'positioneracc_cause' => implode("|",$request->potensial_cause_12),
                        'positioneracc_recommendation' => implode("|",$request->recommendation_12),
                    ]);
                    break;

                case 'REG':
                    # insert new regulator detail product
                    RegProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'orifice_size',
                            'spring_range',
                            'spring_color',
                            'setpoint',
                            'pilot_mfc',
                            'pilot_model',
                            'pilot_springrange',
                            'valve_size',
                        ))
                    );

                    # insert new regulator assessment
                    RegAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'body_condition' => $request->valve_condition_1,
                        'body_condition_level' => $request->health_rating_1,
                        'body_cause' => implode("|",$request->potensial_cause_1),
                        'body_recommendation' => implode("|",$request->recommendation_1),
                        'boltnut_condition' => $request->valve_condition_2,
                        'boltnut_condition_level' => $request->health_rating_2,
                        'boltnut_cause' => implode("|",$request->potensial_cause_2),
                        'boltnut_recommendation' => implode("|",$request->recommendation_2),
                        'bonnet_condition' => $request->valve_condition_3,
                        'bonnet_condition_level' => $request->health_rating_3,
                        'bonnet_cause' => implode("|",$request->potensial_cause_3),
                        'bonnet_recommendation' => implode("|",$request->recommendation_3),
                        'pilot_condition' => $request->valve_condition_4,
                        'pilot_condition_level' => $request->health_rating_4,
                        'pilot_cause' => implode("|",$request->potensial_cause_4),
                        'pilot_recommendation' => implode("|",$request->recommendation_4),
                        'manualoverride_condition' => $request->valve_condition_5,
                        'manualoverride_condition_level' => $request->health_rating_5,
                        'manualoverride_cause' => implode("|",$request->potensial_cause_5),
                        'manualoverride_recommendation' => implode("|",$request->recommendation_5),
                    ]);
                    break;

                case 'CKV':
                    # insert new check valve detail product
                    CkvProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'valve_design',
                            'seat_material',
                            'air_assisted',
                            'dampener',
                            'counter_weight',
                        ))
                    );

                    # insert new check valve assessment
                    CkvAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'packing_condition' => $request->valve_condition_1,
                        'packing_condition_level' => $request->health_rating_1,
                        'packing_cause' => implode("|",$request->potensial_cause_1),
                        'packing_recommendation' => implode("|",$request->recommendation_1),
                        'boltnut_condition' => $request->valve_condition_2,
                        'boltnut_condition_level' => $request->health_rating_2,
                        'boltnut_cause' => implode("|",$request->potensial_cause_2),
                        'boltnut_recommendation' => implode("|",$request->recommendation_2),
                        'sealgasket_condition' => $request->valve_condition_3,
                        'sealgasket_condition_level' => $request->health_rating_3,
                        'sealgasket_cause' => implode("|",$request->potensial_cause_3),
                        'sealgasket_recommendation' => implode("|",$request->recommendation_3),
                        'bonnetgasket_condition' => $request->valve_condition_4,
                        'bonnetgasket_condition_level' => $request->health_rating_4,
                        'bonnetgasket_cause' => implode("|",$request->potensial_cause_4),
                        'bonnetgasket_recommendation' => implode("|",$request->recommendation_4),
                        'manualoverride_condition' => $request->valve_condition_5,
                        'manualoverride_condition_level' => $request->health_rating_5,
                        'manualoverride_cause' => implode("|",$request->potensial_cause_5),
                        'manualoverride_recommendation' => implode("|",$request->recommendation_5),
                    ]);
                    break;

                case 'ISV':
                    # insert new isolation valve detail product
                    IsvProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'plug_material',
                            'seat_material',
                            'stem_material',
                            'operator',
                            'doubleblock_bleed',
                            'leakage_class',
                            'actuator_mfc',
                            'actuator_sn',
                            'actuator_model',
                            'actuator_size',
                            'multi_turn',
                            'torque_seated',
                            'quarter_turn',
                            'position_seated',
                            'local_control',
                            'remote_control',
                            'actuator_ratio',
                            'fail_position',
                            'gear_mfc',
                            'gear_model',
                            'gear_size',
                            'instrument_acc',
                            'instrument_acc_sn',
                            'info_rating',
                            'info_plug',
                            'info_stem',
                            'info_body',
                            'info_seat',
                            'facetoface_dimension',
                        ))
                    );

                    # insert new isolation valve assessment
                    IsvAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'packing_condition' => $request->valve_condition_1,
                        'packing_condition_level' => $request->health_rating_1,
                        'packing_cause' => implode("|",$request->potensial_cause_1),
                        'packing_recommendation' => implode("|",$request->recommendation_1),
                        'sealgasket_condition' => $request->valve_condition_2,
                        'sealgasket_condition_level' => $request->health_rating_2,
                        'sealgasket_cause' => implode("|",$request->potensial_cause_2),
                        'sealgasket_recommendation' => implode("|",$request->recommendation_2),
                        'bonnetgasket_condition' => $request->valve_condition_3,
                        'bonnetgasket_condition_level' => $request->health_rating_3,
                        'bonnetgasket_cause' => implode("|",$request->potensial_cause_3),
                        'bonnetgasket_recommendation' => implode("|",$request->recommendation_3),
                        'valvebody_condition' => $request->valve_condition_4,
                        'valvebody_condition_level' => $request->health_rating_4,
                        'valvebody_cause' => implode("|",$request->potensial_cause_4),
                        'valvebody_recommendation' => implode("|",$request->recommendation_4),
                        'valvetrim_condition' => $request->valve_condition_5,
                        'valvetrim_condition_level' => $request->health_rating_5,
                        'valvetrim_cause' => implode("|",$request->potensial_cause_5),
                        'valvetrim_recommendation' => implode("|",$request->recommendation_5),
                        'boltnut_condition' => $request->valve_condition_6,
                        'boltnut_condition_level' => $request->health_rating_6,
                        'boltnut_cause' => implode("|",$request->potensial_cause_6),
                        'boltnut_recommendation' => implode("|",$request->recommendation_6),
                        'actexternal_condition' => $request->valve_condition_7,
                        'actexternal_condition_level' => $request->health_rating_7,
                        'actexternal_cause' => implode("|",$request->potensial_cause_7),
                        'actexternal_recommendation' => implode("|",$request->recommendation_7),
                        'electricenclosure_condition' => $request->valve_condition_8,
                        'electricenclosure_condition_level' => $request->health_rating_8,
                        'electricenclosure_cause' => implode("|",$request->potensial_cause_8),
                        'electricenclosure_recommendation' => implode("|",$request->recommendation_8),
                        'seal_condition' => $request->valve_condition_9,
                        'seal_condition_level' => $request->health_rating_9,
                        'seal_cause' => implode("|",$request->potensial_cause_9),
                        'seal_recommendation' => implode("|",$request->recommendation_9),
                        'oilleak_condition' => $request->valve_condition_10,
                        'oilleak_condition_level' => $request->health_rating_10,
                        'oilleak_cause' => implode("|",$request->potensial_cause_10),
                        'oilleak_recommendation' => implode("|",$request->recommendation_10),
                        'gearbox_condition' => $request->valve_condition_10,
                        'gearbox_condition_level' => $request->health_rating_10,
                        'gearbox_cause' => implode("|",$request->potensial_cause_10),
                        'gearbox_recommendation' => implode("|",$request->recommendation_10),
                        'manualoverride_condition' => $request->valve_condition_11,
                        'manualoverride_condition_level' => $request->health_rating_11,
                        'manualoverride_cause' => implode("|",$request->potensial_cause_11),
                        'manualoverride_recommendation' => implode("|",$request->recommendation_11),
                        'accessories_condition' => $request->valve_condition_12,
                        'accessories_condition_level' => $request->health_rating_12,
                        'accessories_cause' => implode("|",$request->potensial_cause_12),
                        'accessories_recommendation' => implode("|",$request->recommendation_12),
                    ]);
                    break;

                case 'PRV':
                    # insert new prv detail product
                    PrvProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'code',
                            'inlet',
                            'inlet_choose',
                            'outlet',
                            'outlet_choose',
                            'orifice_size',
                            'set',
                            'capacity',
                            'pilot_operated',
                            'choose'
                        ))
                    );

                    # insert new prv assessment
                    PrvAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'body_condition' => $request->valve_condition_1,
                        'body_condition_level' => $request->health_rating_1,
                        'body_cause' => implode("|",$request->potensial_cause_1),
                        'body_recommendation' => implode("|",$request->recommendation_1),
                        'bonnet_condition' => $request->valve_condition_2,
                        'bonnet_condition_level' => $request->health_rating_2,
                        'bonnet_cause' => implode("|",$request->potensial_cause_2),
                        'bonnet_recommendation' => implode("|",$request->recommendation_2),
                        'bolt_nut_condition' => $request->valve_condition_3,
                        'bolt_nut_condition_level' => $request->health_rating_3,
                        'bolt_nut_cause' => implode("|",$request->potensial_cause_3),
                        'bolt_nut_recommendation' => implode("|",$request->recommendation_3),
                        'pilot_condition' => $request->valve_condition_4,
                        'pilot_condition_level' => $request->health_rating_4,
                        'pilot_cause' => implode("|",$request->potensial_cause_4),
                        'pilot_recommendation' => implode("|",$request->recommendation_4),
                        'manualoverride_condition' => $request->valve_condition_5,
                        'manualoverride_condition_level' => $request->health_rating_5,
                        'manualoverride_cause' => implode("|",$request->potensial_cause_5),
                        'manualoverride_recommendation' => implode("|",$request->recommendation_5),
                    ]);
                    break;

                case 'MAV':
                    # insert new manual valve detail product
                    MavProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'leakage_class',
                            'plug_material',
                            'seat_material',
                            'stem_material',
                            'operator',
                        ))
                    );

                    # insert new manual valve assessment
                    MavAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'packing_condition' => $request->valve_condition_1,
                        'packing_condition_level' => $request->health_rating_1,
                        'packing_cause' => implode("|",$request->potensial_cause_1),
                        'packing_recommendation' => implode("|",$request->recommendation_1),
                        'sealgasket_condition' => $request->valve_condition_2,
                        'sealgasket_condition_level' => $request->health_rating_2,
                        'sealgasket_cause' => implode("|",$request->potensial_cause_2),
                        'sealgasket_recommendation' => implode("|",$request->recommendation_2),
                        'bonnetgasket_condition' => $request->valve_condition_3,
                        'bonnetgasket_condition_level' => $request->health_rating_3,
                        'bonnetgasket_cause' => implode("|",$request->potensial_cause_3),
                        'bonnetgasket_recommendation' => implode("|",$request->recommendation_3),
                        'valvebody_condition' => $request->valve_condition_4,
                        'valvebody_condition_level' => $request->health_rating_4,
                        'valvebody_cause' => implode("|",$request->potensial_cause_4),
                        'valvebody_recommendation' => implode("|",$request->recommendation_4),
                        'valvetrim_condition' => $request->valve_condition_5,
                        'valvetrim_condition_level' => $request->health_rating_5,
                        'valvetrim_cause' => implode("|",$request->potensial_cause_5),
                        'valvetrim_recommendation' => implode("|",$request->recommendation_5),
                        'boltnut_condition' => $request->valve_condition_6,
                        'boltnut_condition_level' => $request->health_rating_6,
                        'boltnut_cause' => implode("|",$request->potensial_cause_6),
                        'boltnut_recommendation' => implode("|",$request->recommendation_6),
                        'gearbox_condition' => $request->valve_condition_7,
                        'gearbox_condition_level' => $request->health_rating_7,
                        'gearbox_cause' => implode("|",$request->potensial_cause_7),
                        'gearbox_recommendation' => implode("|",$request->recommendation_7),
                        'manualoverride_condition' => $request->valve_condition_8,
                        'manualoverride_condition_level' => $request->health_rating_8,
                        'manualoverride_cause' => implode("|",$request->potensial_cause_8),
                        'manualoverride_recommendation' => implode("|",$request->recommendation_8),
                    ]);
                    break;

                default:
                    # insert new tank detail product
                    TnkProduct::create(array_merge(
                        [ 'product_id' => $newProduct->id ],
                        $request->only(
                            'tank_capacity',
                            'tank_product',
                            'vapor_pressure',
                            'specific_gravity',
                            'avg_storage_temp',
                            'insulated',
                            'vents_insulated',
                            'heated_chilled',
                            'insulation_reduction_factor',
                            'max_pump_inrate',
                            'max_pump_outrate',
                            'blanketing_gas',
                            'allowable_tank_moisture',
                            'allowable_tank_o',
                            'blanket_gas_supply',
                            'max_allow_work_press',
                            'max_allow_work_vac',
                            'notes',
                        ))
                    );

                    # insert new tank assessment
                    TnkAssessment::create([
                        'assessment_id' => $newAssessment->id,
                        'product_id' => $newProduct->id,
                        'main_product' => $request->main_product,
                        'other_product' => $request->other_product,
                    ]);
                    break;
            }

            $this->imageRepository->moveImageFiles($newAssessment->id, $newProduct->id);

            DB::commit();

            session()->flash('success', __('formprocess.assessment.store.success'));

            return response()->json([
                'url' => route('assessments.index')
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => __('formprocess.assessment.store.failed')
            ], 500);
        }
    }

    # Display the specified resource.
    public function show($id)
    {
        abort_unless(Gate::allows('assessment_view'), 403);
    }

    # Get valve condition subject list based on device type
    public function showSubjects(Request $request)
    {
        $totalSubject = ValveConditionSubject::where('device_type_id', $request->deviceType)->count();

        return response()->json($totalSubject, 200);
    }

    # Show the form for editing the specified resource.
    public function edit(Assessment $assessment)
    {
        abort_unless(Gate::allows('assessment_edit'), 403);

        $attributes = (object)[
            'title' => 'Site Walkdown',
            'breadcrumb' => (object)[
                (object)[ 'title' => 'Dashboard', 'status' => '', 'previousUrl' => '/' ],
                (object)[ 'title' => 'Site Walkdown', 'status' => '', 'previousUrl' => route('assessments.index') ],
                (object)[ 'title' => 'Edit', 'status' => 'active', 'previousUrl' => '' ]
            ]
        ];

        $getArea = Area::select('title')->find($assessment->area_id);

        $otherarea = [];
        $otherAreas = explode(",", $assessment->otherareas);
        foreach ($otherAreas as $value) {
            $otherarea[] = array($value, $this->otherAreaRepository->getTitleById($value));
        }

        $selectBoxData = [
            'area_sbx' => array($assessment->area_id, $this->areaRepository->getTitleById($assessment->area_id)),
            'otherarea_sbx' => $otherarea
        ];

        $dateActivity = [
            'activityDate' => Carbon::parse($assessment->activity_date)->format('d/m/Y'),
            'minDate' => Carbon::parse($assessment->instruction->date_activity_start)->format('d/m/Y'),
            'maxDate' => Carbon::parse($assessment->instruction->date_activity_end)->format('d/m/Y'),
        ];

        $responsiblePeople = [];

        if(!empty($assessment->responsible_people)) {
            $people = explode(",", $assessment->responsible_people);

            foreach ($people as $person) {
                $personDetail = (object) $this->companyPeopleRepository->getAllById($person);

                $responsiblePeople[] = [
                    'id' => $person,
                    'name' => $personDetail->name,
                    'title' => $personDetail->title,
                    'email' => $personDetail->email,
                ];
            }
        }

        # Get device type initial using relation key 'deviceType' on assessment model
        $deviceTypeInitial = $assessment->deviceType->initial;

        # Get detail assessment from each assessment detail table based on device type initial
        switch ($deviceTypeInitial) {
            case 'COV':
                $productDetail = CovProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = CovAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [
                    'packing' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->packing_condition_level)->title,
                    'bonnet' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnet_condition_level)->title,
                    'bonnetgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnetgasket_condition_level)->title,
                    'valvebody' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->valvebody_condition_level)->title,
                    'valvetrim' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->valvetrim_condition_level)->title,
                    'boltnut' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->boltnut_condition_level)->title,
                    'actexternal' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->actexternal_condition_level)->title,
                    'electricenclosure' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->electricenclosure_condition_level)->title,
                    'seal' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->seal_condition_level)->title,
                    'gearbox' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->gearbox_condition_level)->title,
                    'manualoverride' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->manualoverride_condition_level)->title,
                    'positioneracc' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->positioneracc_condition_level)->title,
                ];
                break;

            case 'REG':
                $productDetail = RegProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = RegAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [
                    'body' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->body_condition_level)->title,
                    'boltnut' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->boltnut_condition_level)->title,
                    'bonnet' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnet_condition_level)->title,
                    'pilot' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->pilot_condition_level)->title,
                    'manualoverride' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->manualoverride_condition_level)->title,
                ];
                break;

            case 'CKV':
                $productDetail = CkvProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = CkvAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [
                    'packing' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->packing_condition_level)->title,
                    'boltnut' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->boltnut_condition_level)->title,
                    'sealgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->sealgasket_condition_level)->title,
                    'bonnetgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnetgasket_condition_level)->title,
                    'manualoverride' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->manualoverride_condition_level)->title,
                ];
                break;

            case 'ISV':
                $productDetail = IsvProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = IsvAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [
                    'packing' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->packing_condition_level)->title,
                    'sealgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->sealgasket_condition_level)->title,
                    'bonnetgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnetgasket_condition_level)->title,
                    'valvebody' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->valvebody_condition_level)->title,
                    'valvetrim' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->valvetrim_condition_level)->title,
                    'boltnut' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->boltnut_condition_level)->title,
                    'actexternal' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->actexternal_condition_level)->title,
                    'electricenclosure' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->electricenclosure_condition_level)->title,
                    'seal' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->seal_condition_level)->title,
                    'oilleak' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->oilleak_condition_level)->title,
                    'gearbox' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->gearbox_condition_level)->title,
                    'manualoverride' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->manualoverride_condition_level)->title,
                    'accessories' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->accessories_condition_level)->title,
                ];
                break;

            case 'PRV':
                $productDetail = PrvProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = PrvAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [
                    'body' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->body_condition_level)->title,
                    'bonnet' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnet_condition_level)->title,
                    'boltnut' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bolt_nut_condition_level)->title,
                    'pilot' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->pilot_condition_level)->title,
                    'manualoverride' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->manualoverride_condition_level)->title,
                ];
                break;

            case 'MAV':
                $productDetail = MavProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = MavAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [
                    'packing' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->packing_condition_level)->title,
                    'sealgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->sealgasket_condition_level)->title,
                    'bonnetgasket' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->bonnetgasket_condition_level)->title,
                    'valvebody' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->valvebody_condition_level)->title,
                    'valvetrim' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->valvetrim_condition_level)->title,
                    'boltnut' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->boltnut_condition_level)->title,
                    'gearbox' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->gearbox_condition_level)->title,
                    'manualoverride' => $this->healthRatingRepository->getHealthRatingById($assessmentDetail->manualoverride_condition_level)->title,
                ];
                break;

            default:
                $productDetail = TnkProduct::where('product_id', $assessment->product_id)->first();
                $assessmentDetail = TnkAssessment::where('assessment_id', $assessment->id)->first();
                $healthRatingByDevice = (object) [];
                break;
        }

        session()->put('health_rating_id', $assessment->health_rating_id);
        session()->put('priority_rating_id', $assessment->priority_rating_id);
        session()->put('health_level_color', $assessment->health_level_color);

        return view('assessment.edit', compact(
            'attributes',
            'assessment',
            'selectBoxData',
            'dateActivity',
            'responsiblePeople',
            'assessmentDetail',
            'productDetail',
            'deviceTypeInitial',
            'healthRatingByDevice'
        ));
    }

    # Update the specified resource in storage.
    public function update(Request $request, Assessment $assessment)
    {
        abort_unless(Gate::allows('assessment_edit'), 403);

        DB::beginTransaction();

        try {
            # get device type alias, such as PRV, MOV, etc
            $deviceType = $this->deviceTypeRepository->getDeviceTypeById($assessment->device_type_id);

            # get product id from products table
            $product = Product::find($assessment->product_id);

            # if product id exists
            if($product) {
                # update products table based on product id
                $product->update(array_merge(
                    [
                        'otherareas' => implode(",", $request->area_others),
                        'health_rating_id' => session('health_rating_id'),
                        'health_level_color' => session('health_level_color'),
                        'priority_rating_id' => session('priority_rating_id'),
                    ],
                    $request->only(
                        'device_type_id',
                        'criticality_level_id',
                        'tagnum',
                        'serial_number',
                        'application',
                        'name_plate',
                        'body_mfc',
                        'body_sn',
                        'body_model',
                        'body_material',
                        'body_size',
                        'class_rating',
                        'manual_override',
                        'end_connection',
                        'company_id',
                        'area_id',
                    )
                ));
            }

            # count total person name from form request
            if(count($request->persons_name) > 0) {
                if(!empty($assessment->responsible_people)) {
                    # compare id between existing and request from form
                    $comparePeople = array_diff(explode(",", $assessment->responsible_people), $request->persons_id);

                    # if there is a record that not match with existing data
                    if(count($comparePeople) > 0) {
                        foreach ($comparePeople as $personId) {
                            # delete unmatch data
                            CompanyPerson::find($personId)->delete();
                        }
                    }
                }

                $responsible_people = [];
                $personKey = 0;

                while ($personKey < count($request->persons_name)) {
                    if(!empty($request->persons_name[$personKey])) {
                        if(!empty($request->persons_id[$personKey])) {
                            # update existing data if person id is match
                            CompanyPerson::where('id', $request->persons_id[$personKey])
                            ->update([
                                'name' => $request->persons_name[$personKey],
                                'title' => $request->persons_title[$personKey],
                                'email' => $request->persons_email[$personKey],
                            ]);

                            $responsible_people[] = $request->persons_id[$personKey];
                        } else {
                            # insert new data if person id is unmatch
                            $companyPerson = CompanyPerson::create([
                                'company_id' => $request->company_id,
                                'name' => $request->persons_name[$personKey],
                                'title' => $request->persons_title[$personKey],
                                'email' => $request->persons_email[$personKey],
                            ]);

                            $responsible_people[] = $companyPerson->id;
                        }
                    }

                    $personKey++;
                }
            } else {
                $responsible_people = [];
            }

            # update existing assessment
            $assessment->update(array_merge(
                [
                    'otherareas' => implode(",", $request->area_others),
                    'health_rating_id' => session('health_rating_id'),
                    'health_level_color' => session('health_level_color'),
                    'priority_rating_id' => session('priority_rating_id'),
                    // 'inspected_by' => '',
                    'voc_leak_report_path' => '',
                    'assessment_record_status' => $request->recordStatus,
                    'responsible_people' => implode(",", $responsible_people)
                ],
                $request->only(
                    'instruction_id',
                    'device_type_id',
                    'criticality_level_id',
                    'company_id',
                    'location_type_id',
                    'location_detail_id',
                    'activity_date',
                    'serial_number',
                    'application',
                    'final_recommendation',
                    'rigging_point_needed',
                    'rigging_point_available',
                    'scaffolding_required',
                    'leak_detection_method',
                    'value_a',
                    'value_b',
                    'value_c',
                    'value_d',
                    'passing_detection_result',
                    'leak_out_value',
                    'leak_out_result',
                    'voc_leak_value',
                    'area_id',
                )
            ));

            # check selected device type
            switch ($deviceType) {
                case 'COV':
                    # insert new control valve detail product
                    CovProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'insulation',
                                'leakage_class',
                                'flow_direction',
                                'actuator_mfc',
                                'actuator_sn',
                                'actuator_model',
                                'actuator_size',
                                'fail_position',
                                'gear_mfc',
                                'gear_model',
                                'gear_size',
                                'positioner_mfc',
                                'positioner_sn',
                                'positioner_model',
                                'communication_protocol',
                                'instrument_acc',
                                'instrument_acc_sn',
                                'info_rating',
                                'info_plug',
                                'info_stem',
                                'info_body',
                                'info_seat',
                                'facetoface_dimension',
                            )
                        );

                    # insert new control valve assessment
                    CovAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'packing_condition' => $request->valve_condition_1,
                            'packing_condition_level' => $request->health_rating_1,
                            'packing_cause' => implode("|",$request->potensial_cause_1),
                            'packing_recommendation' => implode("|",$request->recommendation_1),
                            'bonnet_condition' => $request->valve_condition_2,
                            'bonnet_condition_level' => $request->health_rating_2,
                            'bonnet_cause' => implode("|",$request->potensial_cause_2),
                            'bonnet_recommendation' => implode("|",$request->recommendation_2),
                            'bonnetgasket_condition' => $request->valve_condition_3,
                            'bonnetgasket_condition_level' => $request->health_rating_3,
                            'bonnetgasket_cause' => implode("|",$request->potensial_cause_3),
                            'bonnetgasket_recommendation' => implode("|",$request->recommendation_3),
                            'valvebody_condition' => $request->valve_condition_4,
                            'valvebody_condition_level' => $request->health_rating_4,
                            'valvebody_cause' => implode("|",$request->potensial_cause_4),
                            'valvebody_recommendation' => implode("|",$request->recommendation_4),
                            'valvetrim_condition' => $request->valve_condition_5,
                            'valvetrim_condition_level' => $request->health_rating_5,
                            'valvetrim_cause' => implode("|",$request->potensial_cause_5),
                            'valvetrim_recommendation' => implode("|",$request->recommendation_5),
                            'boltnut_condition' => $request->valve_condition_6,
                            'boltnut_condition_level' => $request->health_rating_6,
                            'boltnut_cause' => implode("|",$request->potensial_cause_6),
                            'boltnut_recommendation' => implode("|",$request->recommendation_6),
                            'actexternal_condition' => $request->valve_condition_7,
                            'actexternal_condition_level' => $request->health_rating_7,
                            'actexternal_cause' => implode("|",$request->potensial_cause_7),
                            'actexternal_recommendation' => implode("|",$request->recommendation_7),
                            'electricenclosure_condition' => $request->valve_condition_8,
                            'electricenclosure_condition_level' => $request->health_rating_8,
                            'electricenclosure_cause' => implode("|",$request->potensial_cause_8),
                            'electricenclosure_recommendation' => implode("|",$request->recommendation_8),
                            'seal_condition' => $request->valve_condition_9,
                            'seal_condition_level' => $request->health_rating_9,
                            'seal_cause' => implode("|",$request->potensial_cause_9),
                            'seal_recommendation' => implode("|",$request->recommendation_9),
                            'gearbox_condition' => $request->valve_condition_10,
                            'gearbox_condition_level' => $request->health_rating_10,
                            'gearbox_cause' => implode("|",$request->potensial_cause_10),
                            'gearbox_recommendation' => implode("|",$request->recommendation_10),
                            'manualoverride_condition' => $request->valve_condition_11,
                            'manualoverride_condition_level' => $request->health_rating_11,
                            'manualoverride_cause' => implode("|",$request->potensial_cause_11),
                            'manualoverride_recommendation' => implode("|",$request->recommendation_11),
                            'positioneracc_condition' => $request->valve_condition_12,
                            'positioneracc_condition_level' => $request->health_rating_12,
                            'positioneracc_cause' => implode("|",$request->potensial_cause_12),
                            'positioneracc_recommendation' => implode("|",$request->recommendation_12),
                        ]);
                    break;

                case 'REG':
                    # update existing regulator detail product
                    RegProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'orifice_size',
                                'spring_range',
                                'spring_color',
                                'setpoint',
                                'pilot_mfc',
                                'pilot_model',
                                'pilot_springrange',
                                'valve_size',
                            )
                        );

                    # insert new regulator assessment
                    RegAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'body_condition' => $request->valve_condition_1,
                            'body_condition_level' => $request->health_rating_1,
                            'body_cause' => implode("|",$request->potensial_cause_1),
                            'body_recommendation' => implode("|",$request->recommendation_1),
                            'boltnut_condition' => $request->valve_condition_2,
                            'boltnut_condition_level' => $request->health_rating_2,
                            'boltnut_cause' => implode("|",$request->potensial_cause_2),
                            'boltnut_recommendation' => implode("|",$request->recommendation_2),
                            'bonnet_condition' => $request->valve_condition_3,
                            'bonnet_condition_level' => $request->health_rating_3,
                            'bonnet_cause' => implode("|",$request->potensial_cause_3),
                            'bonnet_recommendation' => implode("|",$request->recommendation_3),
                            'pilot_condition' => $request->valve_condition_4,
                            'pilot_condition_level' => $request->health_rating_4,
                            'pilot_cause' => implode("|",$request->potensial_cause_4),
                            'pilot_recommendation' => implode("|",$request->recommendation_4),
                            'manualoverride_condition' => $request->valve_condition_5,
                            'manualoverride_condition_level' => $request->health_rating_5,
                            'manualoverride_cause' => implode("|",$request->potensial_cause_5),
                            'manualoverride_recommendation' => implode("|",$request->recommendation_5),
                        ]);
                    break;

                case 'CKV':
                    # insert new check valve detail product
                    CkvProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'valve_design',
                                'seat_material',
                                'air_assisted',
                                'dampener',
                                'counter_weight',
                            )
                        );

                    # insert new check valve assessment
                    CkvAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'packing_condition' => $request->valve_condition_1,
                            'packing_condition_level' => $request->health_rating_1,
                            'packing_cause' => implode("|",$request->potensial_cause_1),
                            'packing_recommendation' => implode("|",$request->recommendation_1),
                            'boltnut_condition' => $request->valve_condition_2,
                            'boltnut_condition_level' => $request->health_rating_2,
                            'boltnut_cause' => implode("|",$request->potensial_cause_2),
                            'boltnut_recommendation' => implode("|",$request->recommendation_2),
                            'sealgasket_condition' => $request->valve_condition_3,
                            'sealgasket_condition_level' => $request->health_rating_3,
                            'sealgasket_cause' => implode("|",$request->potensial_cause_3),
                            'sealgasket_recommendation' => implode("|",$request->recommendation_3),
                            'bonnetgasket_condition' => $request->valve_condition_4,
                            'bonnetgasket_condition_level' => $request->health_rating_4,
                            'bonnetgasket_cause' => implode("|",$request->potensial_cause_4),
                            'bonnetgasket_recommendation' => implode("|",$request->recommendation_4),
                            'manualoverride_condition' => $request->valve_condition_5,
                            'manualoverride_condition_level' => $request->health_rating_5,
                            'manualoverride_cause' => implode("|",$request->potensial_cause_5),
                            'manualoverride_recommendation' => implode("|",$request->recommendation_5),
                        ]);
                    break;

                case 'ISV':
                    # insert new isolation valve detail product
                    IsvProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'plug_material',
                                'seat_material',
                                'stem_material',
                                'operator',
                                'doubleblock_bleed',
                                'leakage_class',
                                'actuator_mfc',
                                'actuator_sn',
                                'actuator_model',
                                'actuator_size',
                                'multi_turn',
                                'torque_seated',
                                'quarter_turn',
                                'position_seated',
                                'local_control',
                                'remote_control',
                                'actuator_ratio',
                                'fail_position',
                                'gear_mfc',
                                'gear_model',
                                'gear_size',
                                'instrument_acc',
                                'instrument_acc_sn',
                                'info_rating',
                                'info_plug',
                                'info_stem',
                                'info_body',
                                'info_seat',
                                'facetoface_dimension',
                            )
                        );

                    # insert new isolation valve assessment
                    IsvAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'packing_condition' => $request->valve_condition_1,
                            'packing_condition_level' => $request->health_rating_1,
                            'packing_cause' => implode("|",$request->potensial_cause_1),
                            'packing_recommendation' => implode("|",$request->recommendation_1),
                            'sealgasket_condition' => $request->valve_condition_2,
                            'sealgasket_condition_level' => $request->health_rating_2,
                            'sealgasket_cause' => implode("|",$request->potensial_cause_2),
                            'sealgasket_recommendation' => implode("|",$request->recommendation_2),
                            'bonnetgasket_condition' => $request->valve_condition_3,
                            'bonnetgasket_condition_level' => $request->health_rating_3,
                            'bonnetgasket_cause' => implode("|",$request->potensial_cause_3),
                            'bonnetgasket_recommendation' => implode("|",$request->recommendation_3),
                            'valvebody_condition' => $request->valve_condition_4,
                            'valvebody_condition_level' => $request->health_rating_4,
                            'valvebody_cause' => implode("|",$request->potensial_cause_4),
                            'valvebody_recommendation' => implode("|",$request->recommendation_4),
                            'valvetrim_condition' => $request->valve_condition_5,
                            'valvetrim_condition_level' => $request->health_rating_5,
                            'valvetrim_cause' => implode("|",$request->potensial_cause_5),
                            'valvetrim_recommendation' => implode("|",$request->recommendation_5),
                            'boltnut_condition' => $request->valve_condition_6,
                            'boltnut_condition_level' => $request->health_rating_6,
                            'boltnut_cause' => implode("|",$request->potensial_cause_6),
                            'boltnut_recommendation' => implode("|",$request->recommendation_6),
                            'actexternal_condition' => $request->valve_condition_7,
                            'actexternal_condition_level' => $request->health_rating_7,
                            'actexternal_cause' => implode("|",$request->potensial_cause_7),
                            'actexternal_recommendation' => implode("|",$request->recommendation_7),
                            'electricenclosure_condition' => $request->valve_condition_8,
                            'electricenclosure_condition_level' => $request->health_rating_8,
                            'electricenclosure_cause' => implode("|",$request->potensial_cause_8),
                            'electricenclosure_recommendation' => implode("|",$request->recommendation_8),
                            'seal_condition' => $request->valve_condition_9,
                            'seal_condition_level' => $request->health_rating_9,
                            'seal_cause' => implode("|",$request->potensial_cause_9),
                            'seal_recommendation' => implode("|",$request->recommendation_9),
                            'oilleak_condition' => $request->valve_condition_10,
                            'oilleak_condition_level' => $request->health_rating_10,
                            'oilleak_cause' => implode("|",$request->potensial_cause_10),
                            'oilleak_recommendation' => implode("|",$request->recommendation_10),
                            'gearbox_condition' => $request->valve_condition_10,
                            'gearbox_condition_level' => $request->health_rating_10,
                            'gearbox_cause' => implode("|",$request->potensial_cause_10),
                            'gearbox_recommendation' => implode("|",$request->recommendation_10),
                            'manualoverride_condition' => $request->valve_condition_11,
                            'manualoverride_condition_level' => $request->health_rating_11,
                            'manualoverride_cause' => implode("|",$request->potensial_cause_11),
                            'manualoverride_recommendation' => implode("|",$request->recommendation_11),
                            'accessories_condition' => $request->valve_condition_12,
                            'accessories_condition_level' => $request->health_rating_12,
                            'accessories_cause' => implode("|",$request->potensial_cause_12),
                            'accessories_recommendation' => implode("|",$request->recommendation_12),
                        ]);
                    break;

                case 'PRV':
                    # insert new prv detail product
                    PrvProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'code',
                                'inlet',
                                'inlet_choose',
                                'outlet',
                                'outlet_choose',
                                'orifice_size',
                                'set',
                                'capacity',
                                'pilot_operated',
                                'choose'
                            )
                        );

                    # insert new prv assessment
                    PrvAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'body_condition' => $request->valve_condition_1,
                            'body_condition_level' => $request->health_rating_1,
                            'body_cause' => implode("|",$request->potensial_cause_1),
                            'body_recommendation' => implode("|",$request->recommendation_1),
                            'bonnet_condition' => $request->valve_condition_2,
                            'bonnet_condition_level' => $request->health_rating_2,
                            'bonnet_cause' => implode("|",$request->potensial_cause_2),
                            'bonnet_recommendation' => implode("|",$request->recommendation_2),
                            'bolt_nut_condition' => $request->valve_condition_3,
                            'bolt_nut_condition_level' => $request->health_rating_3,
                            'bolt_nut_cause' => implode("|",$request->potensial_cause_3),
                            'bolt_nut_recommendation' => implode("|",$request->recommendation_3),
                            'pilot_condition' => $request->valve_condition_4,
                            'pilot_condition_level' => $request->health_rating_4,
                            'pilot_cause' => implode("|",$request->potensial_cause_4),
                            'pilot_recommendation' => implode("|",$request->recommendation_4),
                            'manualoverride_condition' => $request->valve_condition_5,
                            'manualoverride_condition_level' => $request->health_rating_5,
                            'manualoverride_cause' => implode("|",$request->potensial_cause_5),
                            'manualoverride_recommendation' => implode("|",$request->recommendation_5),
                        ]);
                    break;

                case 'MAV':
                    # insert new manual valve detail product
                    MavProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'leakage_class',
                                'plug_material',
                                'seat_material',
                                'stem_material',
                                'operator',
                            )
                        );

                    # insert new manual valve assessment
                    MavAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'packing_condition' => $request->valve_condition_1,
                            'packing_condition_level' => $request->health_rating_1,
                            'packing_cause' => implode("|",$request->potensial_cause_1),
                            'packing_recommendation' => implode("|",$request->recommendation_1),
                            'sealgasket_condition' => $request->valve_condition_2,
                            'sealgasket_condition_level' => $request->health_rating_2,
                            'sealgasket_cause' => implode("|",$request->potensial_cause_2),
                            'sealgasket_recommendation' => implode("|",$request->recommendation_2),
                            'bonnetgasket_condition' => $request->valve_condition_3,
                            'bonnetgasket_condition_level' => $request->health_rating_3,
                            'bonnetgasket_cause' => implode("|",$request->potensial_cause_3),
                            'bonnetgasket_recommendation' => implode("|",$request->recommendation_3),
                            'valvebody_condition' => $request->valve_condition_4,
                            'valvebody_condition_level' => $request->health_rating_4,
                            'valvebody_cause' => implode("|",$request->potensial_cause_4),
                            'valvebody_recommendation' => implode("|",$request->recommendation_4),
                            'valvetrim_condition' => $request->valve_condition_5,
                            'valvetrim_condition_level' => $request->health_rating_5,
                            'valvetrim_cause' => implode("|",$request->potensial_cause_5),
                            'valvetrim_recommendation' => implode("|",$request->recommendation_5),
                            'boltnut_condition' => $request->valve_condition_6,
                            'boltnut_condition_level' => $request->health_rating_6,
                            'boltnut_cause' => implode("|",$request->potensial_cause_6),
                            'boltnut_recommendation' => implode("|",$request->recommendation_6),
                            'gearbox_condition' => $request->valve_condition_7,
                            'gearbox_condition_level' => $request->health_rating_7,
                            'gearbox_cause' => implode("|",$request->potensial_cause_7),
                            'gearbox_recommendation' => implode("|",$request->recommendation_7),
                            'manualoverride_condition' => $request->valve_condition_8,
                            'manualoverride_condition_level' => $request->health_rating_8,
                            'manualoverride_cause' => implode("|",$request->potensial_cause_8),
                            'manualoverride_recommendation' => implode("|",$request->recommendation_8),
                        ]);
                    break;

                default:
                    # insert new tank detail product
                    TnkProduct::where('product_id', $assessment->product_id)
                        ->update($request->only(
                                'tank_capacity',
                                'tank_product',
                                'vapor_pressure',
                                'specific_gravity',
                                'avg_storage_temp',
                                'insulated',
                                'vents_insulated',
                                'heated_chilled',
                                'insulation_reduction_factor',
                                'max_pump_inrate',
                                'max_pump_outrate',
                                'blanketing_gas',
                                'allowable_tank_moisture',
                                'allowable_tank_o',
                                'blanket_gas_supply',
                                'max_allow_work_press',
                                'max_allow_work_vac',
                                'notes',
                            )
                        );

                    # insert new tank assessment
                    TnkAssessment::where('assessment_id', $assessment->id)
                        ->update([
                            'main_product' => $request->main_product,
                            'other_product' => $request->other_product,
                        ]);
                    break;
            }

            $this->imageRepository->moveImageFiles($assessment->id, $assessment->product_id);

            DB::commit();

            session()->flash('success', __('formprocess.assessment.update.success'));

            return response()->json([
                'url' => route('assessments.index')
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => __('formprocess.assessment.update.failed')
            ], 500);
        }
    }

    # Remove the specified resource from storage.
    public function destroy($id)
    {
        abort_unless(Gate::allows('assessment_delete'), 403);
    }

    # Display a listing of the resource on datatable
    public function showRowsOnTable()
    {
        abort_unless(Gate::allows('assessment_access'), 403);

        $actionBtn = request('actionBtn');

        $query = Assessment::with([
            'product:id,tagnum',
            'instruction:id,instruction_num',
            'company:id,name',
            'priorityRating:id,title,color',
            'locationDetail:id,title'
        ]);

        return DataTables::of($query,$actionBtn)
            ->editColumn('activity_date', function($query) {
                return Carbon::parse($query->activity_date)->format('d/m/Y');
            })
            ->addColumn('tag_number', function($query) {
                return $query->product->tagnum;
            })
            ->addColumn('instruction_number', function($query) {
                return $query->instruction->instruction_num;
            })
            ->addColumn('company', function($query) {
                return $query->company->name;
            })
            ->addColumn('servicelocation', function($query) {
                return $query->locationDetail->title;
            })
            ->addColumn('healthstatus', function($query) {
                return '<span class="badge text-white" style="background-color:'.$query->priorityRating->color.'; font-size:0.9em; font-weight:500">'.$query->priorityRating->title.'</span>';
            })
            ->addColumn('inspectedby', function($query) {
                return 'unknown';
            })
            ->addColumn('actions', function($query) use ($actionBtn) {
                if( $actionBtn == 1 ) {
                    return '';
                } else {
                    return '<a href="'.route('assessments.edit', $query->id).'">'.
                                '<i class="fa-solid fa-pen-to-square text-gray cursor-pointer mr-2" title="Edit"></i>'.
                            '</a>'.
                            '<i class="fa-solid fa-trash-can text-gray cursor-pointer mr-2" title="Delete" onclick="deleteInstruction(\''.route('assessments.destroy', $query->id).'\')"></i>'.
                            '<a href="'.route('reporting.pdf', ['id' => $query->id, 'companyid' => null, 'productid' => $query->product_id]).'" target="_blank">'.
                                '<i class="fa-solid fa-folder-open text-gray cursor-pointer" title="Show">Report</i>'.
                            '</a>';
                }
            })
            ->rawColumns(['actions','healthstatus'])
            ->make(true);
    }
}
