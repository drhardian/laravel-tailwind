<?php

namespace App\Http\Controllers;

use App\Interfaces\CriticalityLevelRepositoryInterface;
use App\Interfaces\HealthRatingRepositoryInterface;
use App\Models\SiteWalkDown\Assessment;
use App\Models\SiteWalkDown\CkvAssessment;
use App\Models\SiteWalkDown\CkvProduct;
use App\Models\SiteWalkDown\CompanyPerson;
use App\Models\SiteWalkDown\CovAssessment;
use App\Models\SiteWalkDown\CovProduct;
use App\Models\SiteWalkDown\HealthRating;
use App\Models\SiteWalkDown\IsvAssessment;
use App\Models\SiteWalkDown\IsvProduct;
use App\Models\SiteWalkDown\MavAssessment;
use App\Models\SiteWalkDown\MavProduct;
use App\Models\SiteWalkDown\Otherarea;
use App\Models\SiteWalkDown\PriorityRating;
use App\Models\SiteWalkDown\PrvAssessment;
use App\Models\SiteWalkDown\PrvProduct;
use App\Models\SiteWalkDown\RegAssessment;
use App\Models\SiteWalkDown\RegProduct;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Str;

class SwdReportController extends Controller
{
    private HealthRatingRepositoryInterface $healthRatingRespository;
    private CriticalityLevelRepositoryInterface $criticalityLevelRespository;

    protected $fpdf;
    var $image_w;
    var $image_h;

    public function __construct(
        HealthRatingRepositoryInterface $healthRatingRespository,
        CriticalityLevelRepositoryInterface $criticalityLevelRespository)
    {
        $this->healthRatingRespository = $healthRatingRespository;
        $this->criticalityLevelRespository = $criticalityLevelRespository;

        $this->fpdf = new pdf;
        $this->fpdf->AliasNbPages();
        $this->image_w = 0;
        $this->image_h = 0;
    }

    public function index($id)
    {
        $assessment = Assessment::with([
            'company:id,name',
            'deviceType:id,title,initial',
            'product',
            'area:id,title',
            'criticalityLevel:id,title',
            'healthRating:id,title',
            'priorityRating:id,title,color,level',
            'user:username,name,title,email',
        ])->findOrFail($id);

        $responsiblePeople = CompanyPerson::whereIn('id', explode(",",$assessment->responsible_people))->get();
        $healthRatings = HealthRating::orderByDesc('level')->get();
        $priorityRatings = PriorityRating::orderByDesc('level')->get();

        $activityDate = Carbon::parse($assessment->activity_date)->format('d/m/Y');
        $deviceTypeInitial = $assessment->deviceType->initial;
        $deviceType = $assessment->deviceType->title;
        $companyId = $assessment->company->id;
        $companyName = $assessment->company->name;

        $countValveByCompany = Assessment::where('company_id', $companyId)->count();

        $data = public_path('themes\core\assets\images\ptcs.png');

        $this->fpdf->setHeaderparameter($companyName);

        # FRONT PAGE SECTION #
        $this->fpdf->AddPage();
        $this->fpdf->SetFillColor(231, 230, 230); // warna abu-abu muda
        $this->fpdf->Rect(0, 0, 240, 120, 'F'); // buat persegi panjang
        $this->fpdf->Image($data, 10, 13, 50, 0, 'PNG');

        $this->fpdf->SetFont('Arial', 'B', 12);

        $this->fpdf->SetXY(120, 10);
        $this->fpdf->cell(83, 5, "PT. Control Systems Arena Para Nusa", 0, 1);
        $this->fpdf->SetXY(120, 14);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell(83, 5, "Jl. Ampera Raya No. 9-10, Ragunan, Pasar Minggu Jakarta Selatan");

        $this->fpdf->SetXY(120, 23);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell(83, 5, "http://www.ptcs.co.id");

        $this->fpdf->SetXY(120, 27);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell(83, 5, "Tel	:  021 780 7881");

        $this->fpdf->SetXY(120, 31);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell(83, 5, "Fax	:  021 780 7879");

        $this->fpdf->SetXY(120, 35);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->MultiCell(83, 5, "E-mail	:  sales@ptcs.co.id");

        $this->fpdf->SetXY(5, 85);
        $this->fpdf->SetFont('Arial', 'B', 48);
        $this->fpdf->SetTextColor(255, 255, 255); // set warna teks putih
        $this->fpdf->SetFillColor(47, 82, 143); // warna abu-abu muda
        $this->fpdf->Rect(0, 50, 240, 120, 'F'); // buat persegi panjang
        $this->fpdf->cell(200, 5, $deviceType, 0, 1, "C");
        $this->fpdf->SetFont('Arial', 'B', 28);
        $this->fpdf->ln(15);
        $this->fpdf->cell(200, 5, "Valve Integrity Assessment Report", 0, 1, "C");
        $this->fpdf->ln(40);

        // Bagian Reported
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->cell(40, 5, "Reported by", 0, 0);
        $this->fpdf->cell(4, 5, ":", 0, 0);
        $this->fpdf->cell(150, 5, $assessment->user->name, 0, 1);
        $this->fpdf->ln(2);
        $this->fpdf->cell(40, 5, "Dated", 0, 0);
        $this->fpdf->cell(4, 5, ":", 0, 0);
        $this->fpdf->cell(150, 5, $activityDate, 0, 1);
        $this->fpdf->ln(70);

        // Bagian Prepared
        $this->fpdf->SetFillColor(231, 230, 230); // warna abu-abu muda
        $this->fpdf->Rect(0, 170, 240, 140, 'F'); // buat persegi panjang
        $this->fpdf->SetTextColor(60, 72, 107); // set warna teks hitam
        $this->fpdf->cell(40, 5, "Prepared for", 0, 1);
        $this->fpdf->ln(2);
        $this->fpdf->SetTextColor(0, 0, 0); // set warna teks hitam
        $this->fpdf->cell(150, 5, $companyName, 0, 1);

        # CONTACT PERSON SECTION #
        $this->fpdf->AddPage('P', 'A4', 0);
        $this->fpdf->PageNo();
        $this->fpdf->SetFont('Arial', 'B', 20);
        $this->fpdf->SetTextColor(47, 82, 143);

        $this->fpdf->cell(190, 5, "CONTACT PERSONS", 0, 1, "L");
        $this->fpdf->ln(8);

        $this->fpdf->SetFont('Arial', 'BU', 15);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->cell(40, 5, "PT. Control Systems Arena Para Nusa", 0, 1);
        $this->fpdf->ln(2);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->cell(150, 7, Str::ucfirst(Str::lower($assessment->user->name)), 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->cell(150, 5, Str::ucfirst(Str::lower($assessment->user->title)), 0, 1);
        $this->fpdf->SetFont('Arial', 'I', 12);
        $this->fpdf->cell(150, 5, Str::lower($assessment->user->email), 0, 1);

        if(count($responsiblePeople) > 0) {
            $this->fpdf->ln(5);
            $this->fpdf->SetFont('Arial', 'BU', 15);
            $this->fpdf->cell(40, 5, $companyName, 0, 1);
            $this->fpdf->ln(2);

            foreach ($responsiblePeople as $responsiblePerson) {
                $this->fpdf->SetFont('Arial', 'B', 12);
                $this->fpdf->cell(150, 7, Str::ucfirst(Str::lower($responsiblePerson->name)), 0, 1);
                $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->cell(150, 5, Str::ucfirst(Str::lower($responsiblePerson->title)), 0, 1);
                $this->fpdf->SetFont('Arial', 'I', 12);
                $this->fpdf->cell(150, 5, Str::lower($responsiblePerson->email), 0, 1);
                $this->fpdf->ln(3);
            }
        }

        # INTRODUCTION SECTION #
        $this->fpdf->AddPage('P', 'A4', 0);
        $this->fpdf->SetFont('Arial', 'B', 20);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "INTRODUCTION", 0, 1);
        $this->fpdf->ln(8);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->MultiCell(190, 5, 'PT. Control Systems Arena Para Nusa, Lifecycle Services Division is pleased to have had the opportunity to provide Site Walk Services for your facility [Auto date]. We would like to express our appreciation for the assistance provided by plant personnel involved in the site walk.', 0);
        $this->fpdf->ln(4);

        $this->fpdf->MultiCell(190, 5, 'The goal of a site walk is to determine the valve integrity by recording key data of installed equipment, inspect & analyze actual valve condition and the valve criticality based on your information or application. This criticality level will then be compared with the actual valve condition, and the result is the priority level matrix. we provide you some recommendation of spare part mitigation plan and maintenance plan based on each priority level.', 0);

        # PAGE 3 #
        $this->fpdf->AddPage('P', 'A4', 0);
        $this->fpdf->SetFont('Arial', 'B', 20);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "VALVE CONDITION", 0, 1);
        $this->fpdf->ln(8);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0 );
        $this->fpdf->MultiCell(180, 5, 'This section defines our Health Rating standards. Rating is determined from observations made during our site walk, and if applicable, the result of our diagnostic tools (Ultrasonic leak detector, Volatile Organic Compound/VOC leak detector and valve link report).', 0);
        $this->fpdf->ln(3);

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->SetTextColor(47, 82, 143);

        $this->fpdf->cell(40, 5, "VALVE", 0, 1);
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->ln(4);
        $this->fpdf->SetFont('Arial', '', 12);

        // Text Color First
        $getY_1 = $this->fpdf->GetY();
        $this->fpdf->MultiCell(180, 5, '        (Major Impact Condition): Packing leak, body to bonnet leak, cracked or damaged actuator  Yoke /casings, valve stem assembly oscillating, heavy corrosion (body, bonnet, actuator or positioner).', 0);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(255, 0, 0);
        $this->fpdf->SetFillColor(200, 200, 200);
        $this->fpdf->Rect(10, $getY_1, 14, 5, 'F');
        $this->fpdf->Text(11, $getY_1+4, "Poor");
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->ln(3);
        $this->fpdf->SetFont('Arial', '', 12);
        $getY_2 = $this->fpdf->GetY();
        $this->fpdf->MultiCell(190, 5, '     (Minor impact Condition): Bent tubing, air leaks, positioner damage (or any ancillary components), position feedback damage or missing components, corrosion, low or high supply pressure, evidence of extreme low or high temperatures.', 0);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(255, 255, 0);
        $this->fpdf->SetFillColor(200, 200, 200);
        $this->fpdf->Rect(10, $getY_2, 14, 5, 'F');
        $this->fpdf->Text(11, $getY_2+4, "Fair");
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->ln(3);
        $this->fpdf->SetFont('Arial', '', 12);
        $getY_3 = $this->fpdf->GetY();
        $this->fpdf->MultiCell(190, 5, '            (No Impact - Condition): External visual is good and/or the result of diagnostic tools is good.', 0);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(0, 176, 80);
        $this->fpdf->SetFillColor(200, 200, 200);
        $this->fpdf->Rect(10, $getY_3, 14, 5, 'F');
        $this->fpdf->Text(11, $getY_3+4, "Good");
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->ln(10);
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "INSTRUMENT", 0, 1);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->ln(4);
        $this->fpdf->SetFont('Arial', '', 12);
        // Text Color First
        $getY_4 = $this->fpdf->GetY();
        $this->fpdf->MultiCell(180, 5, '        (Major Impact Condition): Indicates the instrument needs the most immediate attention, especially if it is a control or safety instrument. Non-functional or damaged instruments as well as issues with process connections, electrical connections, worn or cracked gaskets and missing covers are the primary reasons the instruments received this priority.', 0);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(255, 0, 0);
        $this->fpdf->SetFillColor(200, 200, 200);
        $this->fpdf->Rect(10, $getY_4, 14, 5, 'F');
        $this->fpdf->Text(11, $getY_4+4, "Poor");
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->ln(3);
        $this->fpdf->SetFont('Arial', '', 12);
        $getY_5 = $this->fpdf->GetY();
        $this->fpdf->MultiCell(190, 5, '          (Minor impact Condition): The instrument is still functioning but is becoming at risk. Typically, these instruments can be older and/or have conditions like heavy corrosion and moisture in the transmitter.', 0);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(255, 255, 0);
        $this->fpdf->SetFillColor(200, 200, 200);
        $this->fpdf->Rect(10, $getY_5, 14, 5, 'F');
        $this->fpdf->Text(11, $getY_5+4, "Fair");
        $this->fpdf->SetTextColor(0, 0, 0);

        $this->fpdf->ln(3);
        $this->fpdf->SetFont('Arial', '', 12);
        $getY_6 = $this->fpdf->GetY();
        $this->fpdf->MultiCell(190, 5, '          (No Impact - Condition): Low priority indicates the instrument is in good condition and any work needed can be addressed during the routine maintenance calibration cycle.', 0);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(0, 176, 80);
        $this->fpdf->SetFillColor(200, 200, 200);
        $this->fpdf->Rect(10, $getY_6, 14, 5, 'F');
        $this->fpdf->Text(11, $getY_6+4, "Good");
        $this->fpdf->SetTextColor(0, 0, 0);

        # PRIORITY MATRIX SECTION #
        $this->fpdf->AddPage('P', 'A4', 0);
        $this->fpdf->SetFont('Arial', 'B', 18);
        // $this->fpdf->ln(20);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "PRIORITY MATRIX", 0, 1);
        $this->fpdf->ln(10);

        $this->CenterImage(public_path('themes/core/assets/images/criticality.jpg'), 130, 50);
        $this->fpdf->ln(60);
        $this->CenterImage(public_path('themes/core/assets/images/list_criticality.jpg'), 65, 30);

        $this->fpdf->ln(40);
        $this->fpdf->SetFont('Arial', 'B', 18);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "RECOMMENDED MITIGATION PLAN FOR VALVE CRITICALITY", 0, 1);

        $this->fpdf->ln(5);
        $this->CenterImage(public_path('themes/core/assets/images/table_rec_mitigation.png'), 140, 40);
        $this->fpdf->ln(45);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "PRIORITY MATRIX", 0, 1);
        $this->fpdf->ln(5);
        $this->CenterImage(public_path('themes/core/assets/images/action_plan.jpg'), 100, 50);
        $this->fpdf->SetTextColor(0, 0, 0);

        # SUMMARY SECTION #
        $this->fpdf->AddPage('P', 'A4', 0);
        $this->fpdf->SetFont('Arial', 'B', 20);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "SUMMARY", 0, 1);
        $this->fpdf->ln(6);
        $this->fpdf->SetTextColor(255, 255, 255); // set warna teks putih
        $this->fpdf->SetFillColor(47, 82, 143); // warna abu-abu muda
        $this->fpdf->Rect(10, ($this->fpdf->GetY() + 5), 190, 50, 'F'); // buat persegi panjang

        if(request('companyid', null) === null && request('productid', null) !== null) {
            $this->fpdf->SetFont('Arial', 'B', 18);

            $this->fpdf->ln(5);
            $this->fpdf->cell(60, 14, "Criticality Level", 0, 0, "C");
            $this->fpdf->cell(60, 14, "Valve Condition", 0, 0, "C");
            $this->fpdf->cell(70, 14, "Priority Level", 0, 0, "C");

            $this->fpdf->ln(14);
            $this->fpdf->SetFillColor(155, 171, 184); // warna abu-abu muda (#9BABB8)
            $this->fpdf->cell(60, 36, Str::upper($assessment->criticalityLevel->title), 0, 0, "C", 1);
            $this->fpdf->cell(60, 36, Str::upper($assessment->healthRating->title), 0, 0, "C", 1);
            $this->fpdf->SetFillColor(
                hexdec(substr($assessment->priorityRating->color, 1, 2)),
                hexdec(substr($assessment->priorityRating->color, 3, 2)),
                hexdec(substr($assessment->priorityRating->color, 5, 2))
            ); // warna abu-abu muda
            if($assessment->priorityRating->level === 2) {
                $this->fpdf->SetTextColor(0, 0, 0); // set warna teks hitam
            } else {
                $this->fpdf->SetTextColor(255, 255, 255); // set warna teks putih
            }
            $this->fpdf->cell(70, 36, Str::upper($assessment->priorityRating->title), 0, 1, "C", 1);

            $this->fpdf->ln(10);
        } else {
            $this->fpdf->ln(20);
            $this->CenterImage(public_path('themes/core/assets/images/arrow.jpg'), 50, 20);
            $this->fpdf->SetFont('Arial', '', 20);

            $this->fpdf->ln(4);
            $this->fpdf->cell(70, 7, $countValveByCompany, 0, 0, "C");
            $this->fpdf->cell(50, 7, "", 0, 0, "C");
            $this->fpdf->cell(70, 7, "[% VC R&Y]", 0, 0, "C");

            $this->fpdf->ln(8);
            $this->fpdf->cell(70, 7, "Valves Inspected", 0, 0, "C");
            $this->fpdf->cell(50, 7, "", 0, 0, "C");
            $this->fpdf->cell(70, 7, "Need Maintenance", 0, 0, "C");

            $this->fpdf->ln(45);
            $this->CenterImage(public_path('themes/core/assets/images/total_tag.jpg'), 180, 100);

            $this->fpdf->SetTextColor(0, 0, 0); // set warna teks Hitam\
            $this->fpdf->SetFont('Arial', 'B', 12);

            # Total valve based on valve condition
            $yPosStart_ValveCondition = $this->fpdf->GetY() + 17;
            foreach ($healthRatings as $healthRating) {
                $totalValveByCondition = Assessment::where([
                    ['company_id', '=', $companyId],
                    ['health_rating_id', '=', $healthRating->id],
                    ['assessment_record_status', '=', 1],
                ])->count();
                # Valve Tags
                $this->fpdf->Text(104, $yPosStart_ValveCondition, $totalValveByCondition);
                # % of Total tags
                $this->fpdf->Text(163, $yPosStart_ValveCondition, number_format(((($totalValveByCondition / $countValveByCompany) * 100) / 100),1) );

                $yPosStart_ValveCondition = $yPosStart_ValveCondition + 8;
            }

            # Total valve based on priority rating
            $yPosStart_PriorityRating = $yPosStart_ValveCondition+39;
            foreach ($priorityRatings as $priorityRating) {
                $totalValveByPriority = Assessment::where([
                    ['company_id', '=', $companyId],
                    ['priority_rating_id', '=', $priorityRating->id],
                    ['assessment_record_status', '=', 1],
                ])->count();
                # Valve Tags
                $this->fpdf->Text(104, $yPosStart_PriorityRating, $totalValveByPriority);
                # % of Total tags
                $this->fpdf->Text(163, $yPosStart_PriorityRating, number_format(((($totalValveByPriority / $countValveByCompany) * 100) / 100),1) );

                $yPosStart_PriorityRating = $yPosStart_PriorityRating + 8;
            }

            # SITE WALK DETAIL SECTION #
            $this->fpdf->AddPage('P', 'A4', 0);
        }

        $this->fpdf->SetFont('Arial', 'B', 20);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "SITE WALK DETAIL ", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0); // set warna teks putih

        $this->fpdf->ln(10);
        $dataReportNumber = array(
            array('Report #', 'SWD-'.Carbon::now()->format('dm').'/PTCS'.'/'.Carbon::now()->format('Y'))
        );

        $this->BasicTableWrap($dataReportNumber);
        $this->fpdf->ln(10);

        $otherAreaBasedOnAssessment = Otherarea::select('title')->whereIn('id', explode(",", $assessment->otherareas))->get();
        $subArea = [];
        $subAreaCounter = 0;

        foreach ($otherAreaBasedOnAssessment as $area) {
            $subAreaCounter++;
            $subArea[] = ['Sub area '.$subAreaCounter, $area->title];
        }

        $header = array();
        $dataGeneralInformation = array(
            array('Serial Number', $assessment->serial_number),
            array('Valve Condition', $assessment->healthRating->title),
            array('Priority Rating', $assessment->priorityRating->title),
            array('Tag #', $assessment->product->tagnum),
            array('Area', $assessment->area->title),
            array('Aplication', $assessment->application),
            array('Inspected by', $assessment->user->name),
            array('Dated', $activityDate),
            array('Name Plate', $assessment->product->name_plate),
            array('Criticality Rating', $assessment->criticalityLevel->title)
        );

        array_splice($dataGeneralInformation,5,0,$subArea);

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "GENERAL INFORMATION ", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->ln();
        $this->BasicTableWrap($dataGeneralInformation);

        switch ($deviceTypeInitial) {
            case 'PRV':
                $getValveInformationByDeviceType = PrvProduct::where('product_id',$assessment->product->id)->first();
                $valveInformationByDeviceType = array(
                    array('Code', $getValveInformationByDeviceType->code),
                    array('Inlet', $getValveInformationByDeviceType->inlet),
                    array('Inlet Choose ', $getValveInformationByDeviceType->inlet_choose),
                    array('Outlet', $getValveInformationByDeviceType->outlet),
                    array('Outlet Choose', $getValveInformationByDeviceType->outlet_choose),
                    array('Orifice Size', $getValveInformationByDeviceType->orifice_size),
                    array('Set', $getValveInformationByDeviceType->set),
                    array('Capacity', $getValveInformationByDeviceType->capacity),
                    array('Pilot Operated', $getValveInformationByDeviceType->pilot_operated),
                    array('Choose', $getValveInformationByDeviceType->choose),
                );

                $getValveAssessmentResultByDeviceType = PrvAssessment::where('assessment_id', $assessment->id)->first();
                $valveAssessmentResultByDeviceType = array(
                    array(
                        'Body/Base',
                        $getValveAssessmentResultByDeviceType->body_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->body_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->body_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->body_recommendation,)
                    ),
                    array(
                        'Bonnet',
                        $getValveAssessmentResultByDeviceType->bonnet_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnet_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnet_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnet_recommendation)
                    ),
                    array(
                        'Body Bolts & Nuts',
                        $getValveAssessmentResultByDeviceType->bolt_nut_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->bolt_nut_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bolt_nut_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bolt_nut_recommendation)
                    ),
                    array(
                        'Pilot',
                        $getValveAssessmentResultByDeviceType->pilot_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->pilot_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->pilot_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->pilot_recommendation)
                    ),
                    array(
                        'Manual Override',
                        $getValveAssessmentResultByDeviceType->manualoverride_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->manualoverride_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_recommendation)
                    ),
                );

                break;

            case 'COV':
                $getValveInformationByDeviceType = CovProduct::where('product_id',$assessment->product->id)->first();
                $valveInformationByDeviceType = array(
                    array('Insulation', $getValveInformationByDeviceType->insulation),
                    array('Leakage Class', $getValveInformationByDeviceType->leakage_class),
                    array('Flow Direction ', $getValveInformationByDeviceType->flow_direction),
                    array('Actuator Manufacturer', $getValveInformationByDeviceType->actuator_mfc),
                    array('Actuator Serial Number', $getValveInformationByDeviceType->actuator_sn),
                    array('Actuator Model', $getValveInformationByDeviceType->actuator_model),
                    array('Actuator Size', $getValveInformationByDeviceType->actuator_size),
                    array('Fail Position', $getValveInformationByDeviceType->fail_position),
                    array('Gear Manufacturer', $getValveInformationByDeviceType->gear_mfc),
                    array('Gear Model', $getValveInformationByDeviceType->gear_model),
                    array('Gear Size', $getValveInformationByDeviceType->gear_size),
                    array('Positioner Manufacturer', $getValveInformationByDeviceType->positioner_mfc),
                    array('Positioner Serial Number', $getValveInformationByDeviceType->positioner_sn),
                    array('Positioner Model', $getValveInformationByDeviceType->positioner_model),
                    array('Communication Protocol', $getValveInformationByDeviceType->communication_protocol),
                    array('Instrument Accessories', $getValveInformationByDeviceType->instrument_acc),
                    array('Instrument Accessories Serial Number', $getValveInformationByDeviceType->instrument_acc_sn),
                    array('Rating', $getValveInformationByDeviceType->info_rating),
                    array('Plug', $getValveInformationByDeviceType->info_plug),
                    array('Stem', $getValveInformationByDeviceType->info_stem),
                    array('Body', $getValveInformationByDeviceType->info_body),
                    array('Seat', $getValveInformationByDeviceType->info_seat),
                    array('Seat', $getValveInformationByDeviceType->facetoface_dimension),
                );

                $getValveAssessmentResultByDeviceType = CovAssessment::where('assessment_id', $assessment->id)->first();
                $valveAssessmentResultByDeviceType = array(
                    array(
                        'Packing',
                        $getValveAssessmentResultByDeviceType->packing_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->packing_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_recommendation),
                    ),
                    array(
                        'Bonnet',
                        $getValveAssessmentResultByDeviceType->bonnet_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnet_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnet_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnet_recommendation),
                    ),
                    array(
                        'Bonnet Gasket',
                        $getValveAssessmentResultByDeviceType->bonnetgasket_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnetgasket_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_recommendation),
                    ),
                    array(
                        'Valve Body',
                        $getValveAssessmentResultByDeviceType->valvebody_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->valvebody_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvebody_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvebody_recommendation),
                    ),
                    array(
                        'Valve Trim',
                        $getValveAssessmentResultByDeviceType->valvetrim_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->valvetrim_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvetrim_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvetrim_recommendation),
                    ),
                    array(
                        'Body Bolts & Nuts',
                        $getValveAssessmentResultByDeviceType->boltnut_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->boltnut_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_recommendation),
                    ),
                    array(
                        'Actuator External Condition',
                        $getValveAssessmentResultByDeviceType->actexternal_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->actexternal_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->actexternal_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->actexternal_recommendation),
                    ),
                    array(
                        'Electrical Enclosure',
                        $getValveAssessmentResultByDeviceType->electricenclosure_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->electricenclosure_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->electricenclosure_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->electricenclosure_recommendation),
                    ),
                    array(
                        'Seals',
                        $getValveAssessmentResultByDeviceType->seal_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->seal_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->seal_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->seal_recommendation),
                    ),
                    array(
                        'Gearbox',
                        $getValveAssessmentResultByDeviceType->gearbox_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->gearbox_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->gearbox_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->gearbox_recommendation),
                    ),
                    array(
                        'Manual Override',
                        $getValveAssessmentResultByDeviceType->manualoverride_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->manualoverride_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_recommendation),
                    ),
                    array(
                        'Positioner & Accessories',
                        $getValveAssessmentResultByDeviceType->positioneracc_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->positioneracc_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->positioneracc_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->positioneracc_recommendation),
                    ),
                );
                break;

            case 'REG':
                $getValveInformationByDeviceType = RegProduct::where('product_id',$assessment->product->id)->first();
                $valveInformationByDeviceType = array(
                    array('Orifice Size', $getValveInformationByDeviceType->orifice_size),
                    array('Spring Range', $getValveInformationByDeviceType->spring_range),
                    array('Spring Color', $getValveInformationByDeviceType->spring_color),
                    array('Setpoint', $getValveInformationByDeviceType->setpoint),
                    array('Pilot Manufacturer', $getValveInformationByDeviceType->pilot_mfc),
                    array('Pilot Model', $getValveInformationByDeviceType->pilot_model),
                    array('Pilot Spring Range', $getValveInformationByDeviceType->pilot_springrange),
                    array('Size', $getValveInformationByDeviceType->valve_size),
                );

                $getValveAssessmentResultByDeviceType = RegAssessment::where('assessment_id', $assessment->id)->first();
                $valveAssessmentResultByDeviceType = array(
                    array(
                        'Body/Base',
                        $getValveAssessmentResultByDeviceType->body_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->body_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->body_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->body_recommendation),
                    ),
                    array(
                        'Body Bolts & Nuts',
                        $getValveAssessmentResultByDeviceType->boltnut_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->boltnut_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_recommendation),
                    ),
                    array(
                        'Bonnet',
                        $getValveAssessmentResultByDeviceType->bonnet_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnet_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnet_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnet_recommendation),
                    ),
                    array(
                        'Pilot',
                        $getValveAssessmentResultByDeviceType->pilot_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->pilot_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->pilot_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->pilot_recommendation),
                    ),
                    array(
                        'Manual Override',
                        $getValveAssessmentResultByDeviceType->manualoverride_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->manualoverride_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_recommendation),
                    ),
                );
                break;

            case 'CKV':
                $getValveInformationByDeviceType = CkvProduct::where('product_id',$assessment->product->id)->first();
                $valveInformationByDeviceType = array(
                    array('Design', $getValveInformationByDeviceType->valve_design),
                    array('Seat Material', $getValveInformationByDeviceType->seat_material),
                    array('Air Assisted', $getValveInformationByDeviceType->air_assisted),
                    array('Dampener', $getValveInformationByDeviceType->dampener),
                    array('Counter Weight', $getValveInformationByDeviceType->counter_weight),
                );

                $getValveAssessmentResultByDeviceType = CkvAssessment::where('assessment_id', $assessment->id)->first();
                $valveAssessmentResultByDeviceType = array(
                    array(
                        'Packing',
                        $getValveAssessmentResultByDeviceType->packing_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->packing_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_recommendation),
                    ),
                    array(
                        'Body Bolts & Nuts',
                        $getValveAssessmentResultByDeviceType->boltnut_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->boltnut_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_recommendation),
                    ),
                    array(
                        'Pressure Seal Gasket Area',
                        $getValveAssessmentResultByDeviceType->sealgasket_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->sealgasket_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->sealgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->sealgasket_recommendation),
                    ),
                    array(
                        'Bonnet Gasket',
                        $getValveAssessmentResultByDeviceType->bonnetgasket_condition,
                        $this->healthRatingRespository
                             ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnetgasket_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_recommendation),
                    ),
                    array(
                        'Manual Override',
                        $getValveAssessmentResultByDeviceType->manualoverride_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->manualoverride_condition_level)
                             ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_recommendation),
                    ),
                );
                break;

            case 'ISV':
                $getValveInformationByDeviceType = IsvProduct::where('product_id',$assessment->product->id)->first();
                $valveInformationByDeviceType = array(
                    array('Plug/Wedge/Gate Material', $getValveInformationByDeviceType->plug_material),
                    array('Seat Material', $getValveInformationByDeviceType->seat_material),
                    array('Stem Material ', $getValveInformationByDeviceType->stem_material),
                    array('Operator', $getValveInformationByDeviceType->operator),
                    array('Double Block & Bleed', $getValveInformationByDeviceType->doubleblock_bleed),
                    array('Leakage Class', $getValveInformationByDeviceType->leakage_class),
                    array('Actuator Manufacturer', $getValveInformationByDeviceType->actuator_mfc),
                    array('Actuator Serial Number', $getValveInformationByDeviceType->actuator_sn),
                    array('Actuator Model', $getValveInformationByDeviceType->actuator_model),
                    array('Actuator Size', $getValveInformationByDeviceType->actuator_size),
                    array('Multi-Turn', $getValveInformationByDeviceType->multi_turn),
                    array('Torque Seated', $getValveInformationByDeviceType->torque_seated),
                    array('Quarter Turn', $getValveInformationByDeviceType->quarter_turn),
                    array('Position Seated', $getValveInformationByDeviceType->position_seated),
                    array('Local Control', $getValveInformationByDeviceType->local_control),
                    array('Remote Control', $getValveInformationByDeviceType->remote_control),
                    array('Ratio', $getValveInformationByDeviceType->actuator_ratio),
                    array('Fail Position', $getValveInformationByDeviceType->fail_position),
                    array('Gear Manufacturer', $getValveInformationByDeviceType->gear_mfc),
                    array('Gear Model', $getValveInformationByDeviceType->gear_model),
                    array('Gear Size', $getValveInformationByDeviceType->gear_size),
                    array('Instrument/Accessory', $getValveInformationByDeviceType->instrument_acc),
                    array('Instrument/Accessory Serial Number', $getValveInformationByDeviceType->instrument_acc_sn),
                    array('Rating', $getValveInformationByDeviceType->info_rating),
                    array('Plug', $getValveInformationByDeviceType->info_plug),
                    array('Stem', $getValveInformationByDeviceType->info_stem),
                    array('Body', $getValveInformationByDeviceType->info_body),
                    array('Seat', $getValveInformationByDeviceType->info_seat),
                    array('Face to Face Dimension', $getValveInformationByDeviceType->facetoface_dimension),
                );

                $getValveAssessmentResultByDeviceType = IsvAssessment::where('assessment_id', $assessment->id)->first();
                $valveAssessmentResultByDeviceType = array(
                    array(
                        'Packing',
                        $getValveAssessmentResultByDeviceType->packing_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->packing_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_recommendation),
                    ),
                    array(
                        'Pressure Seal Gasket',
                        $getValveAssessmentResultByDeviceType->sealgasket_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->sealgasket_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->sealgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->sealgasket_recommendation),
                    ),
                    array(
                        'Bonnet Gasket',
                        $getValveAssessmentResultByDeviceType->bonnetgasket_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnetgasket_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_recommendation),
                    ),
                    array(
                        'Valve Body',
                        $getValveAssessmentResultByDeviceType->valvebody_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->valvebody_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvebody_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvebody_recommendation),
                    ),
                    array(
                        'Valve Trim',
                        $getValveAssessmentResultByDeviceType->valvetrim_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->valvetrim_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvetrim_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvetrim_recommendation),
                    ),
                    array(
                        'Body Bolts & Nuts',
                        $getValveAssessmentResultByDeviceType->boltnut_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->boltnut_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_recommendation),
                    ),
                    array(
                        'Actuator External Condition',
                        $getValveAssessmentResultByDeviceType->actexternal_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->actexternal_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->actexternal_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->actexternal_recommendation),
                    ),
                    array(
                        'Electrical Enclosure',
                        $getValveAssessmentResultByDeviceType->electricenclosure_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->electricenclosure_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->electricenclosure_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->electricenclosure_recommendation),
                    ),
                    array(
                        'Seals',
                        $getValveAssessmentResultByDeviceType->seal_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->seal_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->seal_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->seal_recommendation),
                    ),
                    array(
                        'Oil Leak',
                        $getValveAssessmentResultByDeviceType->oilleak_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->oilleak_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->oilleak_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->oilleak_recommendation),
                    ),
                    array(
                        'Gear Box',
                        $getValveAssessmentResultByDeviceType->gearbox_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->gearbox_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->gearbox_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->gearbox_recommendation),
                    ),
                    array(
                        'Manual Override',
                        $getValveAssessmentResultByDeviceType->manualoverride_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->manualoverride_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_recommendation),
                    ),
                    array(
                        'Instrument/Accessories Condition',
                        $getValveAssessmentResultByDeviceType->accessories_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->accessories_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->accessories_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->accessories_recommendation),
                    ),
                );
                break;

            case 'MAV':
                $getValveInformationByDeviceType = MavProduct::where('product_id',$assessment->product->id)->first();
                $valveInformationByDeviceType = array(
                    array('Leakage Class', $getValveInformationByDeviceType->leakage_class),
                    array('Plug/Wedge/Gate Material', $getValveInformationByDeviceType->plug_material),
                    array('Seat Material', $getValveInformationByDeviceType->seat_material),
                    array('Stem Material ', $getValveInformationByDeviceType->stem_material),
                    array('Operator', $getValveInformationByDeviceType->operator),
                );

                $getValveAssessmentResultByDeviceType = MavAssessment::where('assessment_id', $assessment->id)->first();
                $valveAssessmentResultByDeviceType = array(
                    array(
                        'Packing',
                        $getValveAssessmentResultByDeviceType->packing_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->packing_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->packing_recommendation),
                    ),
                    array(
                        'Pressure Seal Gasket',
                        $getValveAssessmentResultByDeviceType->sealgasket_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->sealgasket_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->sealgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->sealgasket_recommendation),
                    ),
                    array(
                        'Bonnet Gasket',
                        $getValveAssessmentResultByDeviceType->bonnetgasket_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->bonnetgasket_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->bonnetgasket_recommendation),
                    ),
                    array(
                        'Valve Body',
                        $getValveAssessmentResultByDeviceType->valvebody_condition,
                        $this->healthRatingRespository
                                ->getHealthRatingById($getValveAssessmentResultByDeviceType->valvebody_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvebody_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvebody_recommendation),
                    ),
                    array(
                        'Valve Trim',
                        $getValveAssessmentResultByDeviceType->valvetrim_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->valvetrim_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvetrim_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->valvetrim_recommendation),
                    ),
                    array(
                        'Body Bolts & Nuts',
                        $getValveAssessmentResultByDeviceType->boltnut_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->boltnut_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->boltnut_recommendation),
                    ),
                    array(
                        'Gear Box',
                        $getValveAssessmentResultByDeviceType->gearbox_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->gearbox_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->gearbox_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->gearbox_recommendation),
                    ),
                    array(
                        'Manual Override',
                        $getValveAssessmentResultByDeviceType->manualoverride_condition,
                        $this->healthRatingRespository->getHealthRatingById($getValveAssessmentResultByDeviceType->manualoverride_condition_level)
                                ->title,
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_cause),
                        str_replace("|","\n- ",$getValveAssessmentResultByDeviceType->manualoverride_recommendation),
                    ),
                );
                break;

            default:
                $valveInformationByDeviceType = array();
                $valveAssessmentResultByDeviceType = array();
                break;
        }

        $header = array();
        $dataValveInformation = array(
            array('Body Manufacturer', $assessment->product->body_mfc),
            array('Body Serial number', $assessment->product->body_sn),
            array('Body Model', $assessment->product->body_model),
            array('Body Material', $assessment->product->body_material),
            array('Class Rating', $assessment->product->class_rating),
            array('Manual Override', $assessment->product->manual_override),
        );

        array_splice($dataValveInformation, 6, 0, $valveInformationByDeviceType);

        if( $this->fpdf->GetY() > 40 ) {
            $this->fpdf->ln(10);
        }

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "VALVE INFORMATION - BODY ", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->ln();
        $this->BasicTableWrap($dataValveInformation);
        $this->fpdf->ln(10);

        # ULTRASONIC LEAK DETECTOR SECTION #
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "ULTRASONIC LEAK DETECTOR", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);

        $this->fpdf->ln();

        $leakMethodList = array('2 point','4 point');

        $data = array(
            array('Select Passing Detection Method', !empty($assessment->leak_detection_method) ? $leakMethodList[$assessment->leak_detection_method] : ''),
            array('Value B', !empty($assessment->value_b) ? $assessment->value_b . ' dB' : '-'),
            array('Value C', !empty($assessment->value_c) ? $assessment->value_c . ' dB' : '-'),
            array('Value A', !empty($assessment->value_a) ? $assessment->value_a . ' dB' : '-'),
            array('Value D', !empty($assessment->value_d) ? $assessment->value_d . ' dB' : '-'),
            array('Passing detection result', $assessment->passing_detection_result),
            array('Leak Out Value ', !empty($assessment->leak_out_value) ? $assessment->leak_out_value . ' dB' : '-'),
            array('Leak Out detection result', $assessment->leak_out_result),
        );

        $this->BasicTableWrap($data);

        $this->fpdf->ln(10);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "VOC LEAK DETECTOR", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->ln();

        $header = array();
        $dataVocLeak = array(
            array('Value', !empty($assessment->voc_leak_value) ? $assessment->voc_leak_value . ' ppm' : ''),
        );

        $this->BasicTableWrap($dataVocLeak);

        $header = array('Body', 'Condition', 'Health Rating', 'Potensial Cause', 'Recommendation');

        if($this->fpdf->GetY() > 260 ) {
            $this->fpdf->AddPage('P', 'A4', 0);
        } else {
            $this->fpdf->ln(10);
        }

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "VISUAL ASSESMENT RESULT", 0, 1);
        $this->fpdf->ln(5);

        $this->fpdf->SetFont('Arial', '', 12);
        $this->BasicTableWMulticell($header, $valveAssessmentResultByDeviceType);

        $this->fpdf->ln(10);

        $dataAccessPoint = array(
            array('Rigging Point Needed ', $assessment->rigging_point_needed),
            array('Rigging Point Available ', $assessment->rigging_point_available),
            array('Scaffolding Required ', $assessment->scaffolding_required),
        );

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "ACCESS POINT", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->ln();
        $this->BasicTableWrap($dataAccessPoint);

        $this->fpdf->AddPage('P', 'A4', 0);

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "PHOTO", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->ln(5);

        $image_paths = [];

        foreach ($assessment->assessmentImages as $image) {
            $image_paths[] = $image->path;
        }

        $this->loop_add_image($image_paths);
        $this->fpdf->AddPage('P', 'A4', 0);
        // $this->fpdf->ln(10);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "RECOMMENDATION", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0,0,0);
        $lorem = 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.';
        $this->fpdf->ln(3);
        $this->fpdf->MultiCell(190, 5, $lorem, 0);

        $this->fpdf->AddPage('P', 'A4', 0);
        // $this->fpdf->ln(15);
        $this->fpdf->SetFont('Arial', 'B', 25);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->cell(40, 5, "CONCLUSION", 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->ln(10);
        $lorem = 'In order for your facility to enjoy optimal process control, the equipment elements must be kept in well-maintained and updated condition. Well maintained equipment and timely response support improvements such as:';

        $this->fpdf->MultiCell(190, 5, $lorem, 0);
        $this->fpdf->ln(3);
        $this->bullet(10);
        $this->fpdf->cell(160, 5, "Reduced process variability", 0, 1);
        $this->bullet(10);
        $this->fpdf->cell(160, 5, "Reduced potential for unplanned shutdown", 0, 1);
        $this->bullet(10);
        $this->fpdf->cell(160, 5, "Increased production", 0, 1);
        $this->bullet(10);
        $this->fpdf->cell(160, 5, "Improved product quality", 0, 1);
        $this->bullet(10);
        $this->fpdf->cell(160, 5, "Reduced energy consumption", 0, 1);
        $this->fpdf->ln(5);

        $lorem = 'Thank you for allowing PT. Control Systems Arena Para Nusa to participate in your maintenance efforts, please feel free to contact us if you need further information.';

        $this->fpdf->MultiCell(190, 5, $lorem, 0);

        $this->fpdf->SetXY(10, 150);
        $this->fpdf->cell(160, 5, "Reported by,", 0, 1);
        $this->fpdf->ln(20);

        $this->fpdf->cell(160, 5, "[Name]", 0, 1);
        $this->fpdf->cell(160, 5, "[Tittle],", 0, 1);
        $this->fpdf->cell(160, 5, "[email address],", 0, 1);
        $this->fpdf->cell(160, 5, "This is a computer-generated document. No signature is required.,", 0, 1);
        $this->fpdf->ln(5);

        $this->fpdf->SetXY(10, 220);
        $this->fpdf->SetTextColor(47, 82, 143);
        $this->fpdf->SetFont('Arial', 'B', 12);

        $this->fpdf->cell(160, 5, "PT. Control Systems Arena Para Nusa", 0, 1);
        $this->fpdf->cell(160, 5, "Emerson Select Service Provider", 0, 1);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->ln();
        $this->fpdf->SetFont('Arial', '', 12);

        $lorem = 'Select Service Provider is Local Business Partners of Emerson, handle sales, service and support for Emerson’s valve, actuator and/or regulator product portfolio, and have met the ASP (Accredited Service Providers) audit criteria. We offer base service support, warranty, repair support in the field or at their service depot; plan and execute shutdowns, turnarounds and outages; and provide replacement assemblies and technology upgrades for the products we represent. ';

        $this->fpdf->MultiCell(190, 5, $lorem, 0);
        $this->fpdf->Output();

        exit;
    }

    function vcell($c_width,$c_height,$x_axis,$text)
    {
        $w_w = $c_height / 3;
        $w_w_1 = $w_w + 2;
        $w_w1 = $w_w + $w_w + $w_w + 3;
        $len = strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array

        $lengthToSplit = 20;

        if($len > $lengthToSplit){
            $w_text=str_split($text,$lengthToSplit);
            $this->fpdf->SetX($x_axis);
            $this->fpdf->Cell($c_width,$w_w_1,$w_text[0],'','','');

            if(isset($w_text[1])) {
                $this->fpdf->SetX($x_axis);
                $this->fpdf->Cell($c_width,$w_w1,$w_text[1],'','','');
            }

            $this->fpdf->SetX($x_axis);
            $this->fpdf->Cell($c_width,$c_height,'','LTRB',0,'L',0);
        } else {
            $this->fpdf->SetX($x_axis);
            $this->fpdf->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);
        }
    }

    function bullet($cellwidth = '0')
    {
        //bullet point is chr(127)
        $this->fpdf->Cell($cellwidth, 5, chr(127), 0, 0, 'R');
    }

    function loop_add_image($image_paths)
    {
        // ukuran gambar
        $width = 85;
        $height = 50;

        // posisi x dan y untuk gambar pertama
        $x1 = $this->fpdf->GetPageWidth() / 2 - $width / 2;
        $y1 = $this->fpdf->GetPageHeight() / 2 - $height - 35;

        // posisi x dan y untuk gambar kedua
        $x2 = $this->fpdf->GetPageWidth() / 2 - $width / 2;
        $y2 = $y1 + $height + 10; // jarak antara kedua gambar

        $i = 0;

        $y = $this->fpdf->GetY();
        $x = $this->fpdf->GetX();

        $xImg = 22;
        $counter1 = 0;

        foreach ($image_paths as $image_path) {
            $counter1++;

            if($counter1 === 3) {
                $counter1 = 1;
                $xImg = 22;
                $y = $y + ($height+5);
            }

            // if( file_exists( $image_path ) ) {

                if($y >= 271.00125 && ($this->fpdf->GetY()+50) >= 271.00125) {
                    $this->fpdf->AddPage('P', 'A4', 0);
                    $y = 42;
                }

                // $showImage = $this->convertImage(
                //                 public_path('storage/'.trim($surveyid).'/Survey'.'/'),
                //                 trim($surveyimage->image_id),
                //                 trim($surveyimage->image_type),
                //                 $surveyimage->id,
                //                 storage_path('app/public/valve_images/' . trim($surveyid) . '/Survey' . '/'),
                //                 '.png',
                //                 '.jpg'
                //             );

                $this->fpdf->Image($image_path, $xImg, $y, $width, $height);
                // $this->fpdf->Cell($xImg, $y, $counter1);
            // } else {
            //     $this->fpdf->Image(public_path('avatar/no-image.png'), $xImg, $y, 45, 45);
            // }

            $xImg += ($width + 5);

            // if ($i != 2) {
            //     if ($i % 2 == 0) {
            //         // tambahkan gambar pertama
            //         $this->fpdf->Image($image_path, $x1, $y1, $width, $height);
            //         $y1 += $height + 10; // jarak antara kedua gambar
            //     } else {
            //         // tambahkan gambar kedua
            //         $this->fpdf->Image($image_path, $x2, $y2, $width, $height);
            //         $y2 += $height + 10; // jarak antara kedua gambar
            //     }
            //     $i++;
            // } else {
            //     $this->fpdf->AddPage('P', 'A4', 0);
            //     $y1 = $this->fpdf->GetPageHeight() / 2 - $height - 35;
            //     $y2 = $y1 + $height + 10; // jarak antara kedua gambar
            //     $i = 0;

            //     if ($i % 2 == 0) {
            //         // tambahkan gambar pertama
            //         $this->fpdf->Image($image_path, $x1, $y1, $width, $height);
            //         $y1 += $height + 10; // jarak antara kedua gambar
            //     } else {
            //         // tambahkan gambar kedua
            //         $this->fpdf->Image($image_path, $x2, $y2, $width, $height);
            //         $y2 += $height + 10; // jarak antara kedua gambar
            //     }
            // }
        }
        $this->fpdf->SetY($y + 53);
    }

    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        $width = 50;
        foreach ($header as $col) {
            $this->fpdf->Cell($width, 7, $col, 1);
            $width = 135;
        }
        $this->fpdf->Ln();
        // Data
        foreach ($data as $row) {
            $width = 50;

            foreach ($row as $col) {
                $this->fpdf->Cell($width, 6, $col, 1);
                $width = 135;
            }
            $this->fpdf->Ln();
        }
    }

    function BasicTableWrap($data)
    {
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0);

        foreach ($data as $rows) {
            $columNumber = 0;
            $width = 50;
            $initialX = 10;
            $initialY = $this->fpdf->GetY();

            $lastYPos = [];
            foreach ($rows as $col) {
                $this->fpdf->setXY($initialX, $initialY);

                if($columNumber == 0) {
                    $this->fpdf->SetFont('Arial', '', 12);
                    $this->fpdf->SetTextColor(47, 82, 143);

                    $width = $width;
                } else {
                    $this->fpdf->SetFont('Arial', '', 12);
                    $this->fpdf->SetTextColor(0, 0, 0);

                    $width = 135;
                }

                if($columNumber == 4) {
                    $rowIconIndent = "- ";
                } else {
                    $rowIconIndent = "";
                }

                $initialX = $initialX + $width;

                $this->fpdf->MultiCell($width, 8, $rowIconIndent.$col, 0, 'L');
                $width = 33.75;
                $columNumber++;
                $lastYPos[] = $this->fpdf->GetY();
            }

            $this->fpdf->setY(max($lastYPos));
            $this->fpdf->SetDrawColor(157, 178, 191);
            $this->fpdf->Cell(185, 0.5, '', 'B', 1);

            if(max($lastYPos) >= 240) {
                $this->fpdf->AddPage('P', 'A4', 0);
            }
        }
    }

    function BasicTable2($header, $data)
    {
        // Header
        $width = 80;
        foreach ($header as $col) {
            $this->fpdf->Cell($width, 7, $col, 1);
            $width = 105;
        }
        $this->fpdf->Ln();
        // Data
        foreach ($data as $row) {
            $width = 80;
            if (count($row) > 2) {
                foreach ($row as $col) {
                    $this->fpdf->Cell($width, 6, $col, 1);
                    $width = 52.5;
                }
            } else {
                foreach ($row as $col) {
                    $this->fpdf->Cell($width, 6, $col, 1);
                    $width = 105;
                }
            }

            $this->fpdf->Ln();
        }
    }

    function BasicTable5Column($header, $data)
    {
        // Header
        $width = 50;
        foreach ($header as $col) {
            $this->fpdf->Cell($width, 7, $col, 1);
            $width = 33.75;
        }
        $this->fpdf->Ln();
        // Data
        foreach ($data as $row) {
            $width = 50;
            foreach ($row as $col) {
                $this->fpdf->Cell($width, 6, $col, 1);
                $width = 33.75;
            }

            $this->fpdf->Ln();
        }
    }

    function BasicTableWMulticell($header, $data)
    {
        // Header
        $totalWidth = 0;
        $width = 40;
        $headerIteration = 0;
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(255, 255, 255);
        $this->fpdf->SetFillColor(47, 82, 143);
        foreach ($header as $col) {
            if($headerIteration == 0) {
                $width = $width;
            } elseif($headerIteration == 1 || $headerIteration == 2) {
                $width = $width-5;
            } else {
                $width = $width+10;
            }

            $this->fpdf->Cell($width, 7, $col, 0, 0, 'C', 1);

            $totalWidth = $totalWidth + $width;
            $width = 33.75;
            $headerIteration++;

        }
        $this->fpdf->Ln();

        // Data
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0);

        foreach ($data as $rows) {
            $contentIteration = 0;
            $width = 40;
            $initialX = 10;
            $initialY = $this->fpdf->GetY();

            $lastYPos = [];
            foreach ($rows as $col) {
                $this->fpdf->setXY($initialX, $initialY);

                if($contentIteration == 0) {
                    $this->fpdf->SetFont('Arial', 'B', 12);
                    $this->fpdf->SetTextColor(47, 82, 143);

                    $width = $width;
                } elseif($contentIteration == 1 || $contentIteration == 2) {
                    $this->fpdf->SetFont('Arial', '', 12);
                    $this->fpdf->SetTextColor(0, 0, 0);

                    $width = $width-5;
                } else {
                    $this->fpdf->SetFont('Arial', '', 12);
                    $this->fpdf->SetTextColor(0, 0, 0);

                    $width = $width+10;
                }

                if($contentIteration == 4) {
                    $rowIconIndent = "- ";
                } else {
                    $rowIconIndent = "";
                }

                $initialX = $initialX + $width;

                $this->fpdf->MultiCell($width, 7, $rowIconIndent.$col, 0, 'L');
                $width = 33.75;
                $contentIteration++;
                $lastYPos[] = $this->fpdf->GetY();
            }

            $this->fpdf->setY(max($lastYPos));
            $this->fpdf->SetDrawColor(157, 178, 191);
            $this->fpdf->Cell($totalWidth, 4, '', 'B', 1);

            if(max($lastYPos) >= 240) {
                $this->fpdf->AddPage('P', 'A4', 0);
            }
        }

        // foreach ($data as $row) {
        //     $width = 50;
        //     $rowIteration = 0;
        //     $currentY = 0;
        //     foreach ($row as $col) {
        //         if($rowIteration==0) {
        //             $this->fpdf->Cell($width, 6, $col, 1);
        //         } elseif($rowIteration==3) {
        //             $potensialCause = "";
        //             foreach (explode("|", $col) as $value) {
        //                 $potensialCause = $potensialCause."- ".$value."\n";
        //             }

        //             $width = $width+59;
        //             $currentY = $this->fpdf->GetY();

        //             $this->fpdf->MultiCell($width,6,$potensialCause);
        //         } elseif($rowIteration==4) {
        //             $recommendation = "";
        //             foreach (explode("|", $col) as $value) {
        //                 $recommendation = $recommendation."- ".$value."\n";
        //             }

        //             $width = $width+58.5;
        //             $this->fpdf->SetXY(102.8,$currentY);

        //             $this->fpdf->MultiCell($width,6,$recommendation);
        //         } else {
        //             $this->fpdf->Cell(($width*2), 6, $col, 1);
        //         }

        //         $width = 33.75;

        //         if($rowIteration == 2) { $this->fpdf->Ln(); }

        //         $rowIteration++;
        //     }
        //     $this->fpdf->Ln();
        // }
    }

    function GetImageDimensions($file)
    {
        // Dapatkan dimensi gambar
        list($this->image_w, $this->image_h) = getimagesize($file);
    }

    function CenterImage($file, $width, $height)
    {
        // Dapatkan dimensi gambar
        $this->GetImageDimensions($file);

        // Hitung letak horizontal untuk gambar
        // $x = ($this->fpdf->GetPageWidth() - $this->image_w) / 2;
        $x = ($this->fpdf->GetPageWidth() - $width) / 2;
        // Tambahkan gambar ke posisi yang ditentukan
        $this->fpdf->Image($file, $x, $this->fpdf->GetY(), $width, $height);
    }
}

class Pdf extends Fpdf
{
    protected $companyName;

    public function setHeaderparameter($companyName)
    {
        $this->companyName = $companyName;
    }

    function Header()
    {
        if ($this->PageNo() !== 1) {
            // Tambahkan konten header di sini
            $this->SetFont('Arial', '', 12);
            $this->SetTextColor(123, 143, 161);
            $this->Cell(0, 5, 'Valve Integrity Assessment Report', 0, 1, 'L');
            $this->SetFont('Arial', 'B', 14);
            $this->SetTextColor(86, 113, 137);
            $this->Cell(0, 10, $this->companyName, 0, 1, 'L');
            $currentY = $this->GetY();
            $pageWidth = $this->GetPageWidth();
            $this->SetDrawColor(157, 178, 191);
            $this->Line(0, $currentY, $pageWidth, $currentY);
            $this->Ln(8);
        }
    }

    function Footer()
    {
        if ($this->PageNo() !== 1) {
            $this->SetY(-12);
            // Nomor halaman
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 5, $this->PageNo() - 1, 0, 0, 'R');
        }
    }
}
