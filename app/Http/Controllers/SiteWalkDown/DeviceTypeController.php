<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;

use App\Interfaces\DeviceTypeRepositoryInterface;
use App\Models\SiteWalkDown\DeviceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceTypeController extends Controller
{
    private DeviceTypeRepositoryInterface $deviceTypeRepository;

    public function __construct(DeviceTypeRepositoryInterface $deviceTypeRepository)
    {
        $this->deviceTypeRepository = $deviceTypeRepository;
    }

    # Display a listing of the resource.
    public function index()
    {
        abort_unless(Gate::allows('devicetype_access'), 403);
    }

    # Show the form for creating a new resource.
    public function create()
    {
        abort_unless(Gate::allows('devicetype_create'), 403);
    }

    # Store a newly created resource in storage.
    public function store(Request $request)
    {
        abort_unless(Gate::allows('devicetype_create'), 403);
    }

    # Display the specified resource.
    public function show($id)
    {
        abort_unless(Gate::allows('devicetype_view'), 403);
    }

    # Show the form for editing the specified resource.
    public function edit($id)
    {
        abort_unless(Gate::allows('devicetype_update'), 403);
    }

    # Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('devicetype_update'), 403);
    }

    # Remove the specified resource from storage.
    public function destroy($id)
    {
        abort_unless(Gate::allows('devicetype_delete'), 403);
    }

    # Display a listing of the resource on selectbox.
    public function showonselectbox()
    {
        $queries = DeviceType::select('id','title','initial')
                    ->when(request('search', false), function($query) {
                        return $query->where('title', 'like', '%'.request('search').'%');
                    })
                    ->get();

        $response = [];

        foreach($queries as $query){
            $response[] = array(
                "id" => $query->id,
                "text" => $query->title,
                "initial" => $query->initial,
            );
        }

        return response()->json($response);
    }

    # Show the form of the specified resource based on device type.
    public function showalias(Request $request)
    {
        session()->forget([
            'healthLevelSession',
            'health_rating_id',
            'health_level_color',
            'priority_rating_id',
        ]);

        $deviceType = $this->deviceTypeRepository->getDeviceTypeById($request->deviceTypeId);

        if($request->formId == "valve-info") {
            switch ($deviceType) {
                case 'COV':
                    return view('sitewalkdown.assessment.valveinformation.create-cov');
                    break;

                case 'REG':
                    return view('sitewalkdown.assessment.valveinformation.create-reg');
                    break;

                case 'CKV':
                    return view('sitewalkdown.assessment.valveinformation.create-ckv');
                    break;

                case 'ISV':
                    return view('sitewalkdown.assessment.valveinformation.create-isv');
                    break;

                case 'PRV':
                    return view('sitewalkdown.assessment.valveinformation.create-prv');
                    break;

                case 'MAV':
                    return view('sitewalkdown.assessment.valveinformation.create-mav');
                    break;

                default:
                    return view('sitewalkdown.assessment.valveinformation.create-tnk');
                    break;
            }
        } elseif($request->formId == "assessment-form") {
            switch ($deviceType) {
                case 'COV':
                    return view('sitewalkdown.assessment.create-cond-cov');
                    break;

                case 'REG':
                    return view('sitewalkdown.assessment.create-cond-reg');
                    break;

                case 'CKV':
                    return view('sitewalkdown.assessment.create-cond-ckv');
                    break;

                case 'ISV':
                    return view('sitewalkdown.assessment.create-cond-isv');
                    break;

                case 'PRV':
                    return view('sitewalkdown.assessment.create-cond-prv');
                    break;

                case 'MAV':
                    return view('sitewalkdown.assessment.create-cond-mav');
                    break;

                default:
                    return view('sitewalkdown.assessment.create-cond-cov');
                    break;
            }
        }
    }
}
