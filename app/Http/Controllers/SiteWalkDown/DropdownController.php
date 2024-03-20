<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;

use App\Models\SiteWalkDown\DeviceType;
use App\Models\SiteWalkDown\Dropdown;
use App\Models\SiteWalkDown\HealthRating;
use App\Models\SiteWalkDown\PotensialCauseOption;
use App\Models\SiteWalkDown\PriorityMatrix;
use App\Models\SiteWalkDown\RecommendationOption;
use App\Models\SiteWalkDown\ValveConditionOption;
use App\Models\SiteWalkDown\ValveConditionSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromDropdown()
    {
        try {
            $deviceTypes = DeviceType::select('initial')->find(request('devicetype'));
            $devicetype = $deviceTypes->initial;

            $query = Dropdown::where([
                    [ 'title', '=', request('newoption') ],
                    [ 'alias', '=', request('alias') ]
                ])
                ->when(request('datascope', false), function($query) use ($devicetype) {
                    return $query->where('device_type', '=', $devicetype);
                })
                ->firstOrCreate([
                    'title' => request('newoption'),
                    'alias' => request('alias'),
                    'device_type' => request('datascope', false) ? $devicetype:null
                ]);

            $setSelected = array(
                "id" => $query->title,
                "text" => $query->title
            );

            return response()->json([
                'status' => 200,
                'message' => $setSelected
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => 'Error while processing data'
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeValveConditionFromDropdown()
    {
        try {
            if( request('criticalityLevel', false) == false ) {
                return response()->json([
                    'message' => __('formprocess.assessment.dropdown.criticalitylevel.undefined')
                ], 500);
            } else {
                $valveConditionSubjectId = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', request('devicetype')],
                    ['code', '=', request('alias')]
                ])->first();

                $query = ValveConditionOption::firstOrCreate(
                    [
                        'device_type_id' => request('devicetype'),
                        'valve_condition_subject_id' => $valveConditionSubjectId->id,
                        'title' => request('newoption')
                    ],
                    [ 'health_rating_id' => request('datareff') ]
                );

                # Get selected health rating
                $selectedHealthRating = HealthRating::find($query->health_rating_id);

                session()->put('healthLevelSession.'.request('alias'), $selectedHealthRating->level);

                # Get health rating based on max selected level
                $getHealthRatingIdByMaxLevel = HealthRating::select('id','title')
                    ->where('level',max(array_values(session('healthLevelSession'))))
                    ->first();

                # Get priority rating id based on priority matrix
                $getPriorityRating = PriorityMatrix::with('priorityRating')->select('priority_rating_id')
                    ->where([
                        ['criticality_level_id', '=', request('criticalityLevel')],
                        ['health_rating_id', '=', $getHealthRatingIdByMaxLevel->id],
                    ])->first();

                $setSelected = array(
                    "id" => $query->title,
                    "text" => $query->title,
                    "healthRatingId" => $selectedHealthRating->id,
                    "healthRatingText" => $selectedHealthRating->title,
                    "healthLevelRating" => $getHealthRatingIdByMaxLevel->title,
                    "healthPriorityRating" => [
                        'color' => $getPriorityRating->priorityRating->color,
                        'title' => $getPriorityRating->priorityRating->title
                    ],
                );

                session()->put('health_rating_id', $getHealthRatingIdByMaxLevel->id);
                session()->put('priority_rating_id', $getPriorityRating->priorityRating->id);
                session()->put('health_level_color', $getPriorityRating->priorityRating->color);

                return response()->json([
                    'status' => 200,
                    'message' => $setSelected
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => 'Error while processing data'
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePotensialCauseFromDropdown()
    {
        try {
            $valveConditionSubjectId = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', request('devicetype')],
                    ['code', '=', request('alias')]
                ])->first();

            $query = PotensialCauseOption::where([
                    ['device_type_id', '=', request('devicetype')],
                    ['valve_condition_subject_id', '=', $valveConditionSubjectId->id],
                    ['title', '=', request('newoption')]
                ])
                ->firstOrCreate(
                    [
                        'device_type_id' => request('devicetype'),
                        'valve_condition_subject_id' => $valveConditionSubjectId->id,
                        'title' => request('newoption')
                    ]
                );

            $setSelected = array(
                "id" => $query->title,
                "text" => $query->title,
            );

            return response()->json([
                'status' => 200,
                'message' => $setSelected
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => 'Error while processing data'
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRecommendationFromDropdown()
    {
        try {
            $valveConditionSubjectId = ValveConditionSubject::select('id')
                ->where([
                    ['device_type_id', '=', request('devicetype')],
                    ['code', '=', request('alias')]
                ])->first();

            $query = RecommendationOption::where([
                    ['device_type_id', '=', request('devicetype')],
                    ['valve_condition_subject_id', '=', $valveConditionSubjectId->id],
                    ['title', '=', request('newoption')]
                ])
                ->firstOrCreate(
                    [
                        'device_type_id' => request('devicetype'),
                        'valve_condition_subject_id' => $valveConditionSubjectId->id,
                        'title' => request('newoption')
                    ]
                );

            $setSelected = array(
                "id" => $query->title,
                "text" => $query->title,
            );

            return response()->json([
                'status' => 200,
                'message' => $setSelected
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => 'Error while processing data'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function show(Dropdown $dropdown)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function showOnDropdown()
    {
        try {
            if( request('devicetype', false) == false && request('datascope', false) != false ) {
                return response()->json([
                    'message' => __('formprocess.assessment.dropdown.valvetype.undefined')
                ], 500);
            } else {
                $deviceTypes = DeviceType::select('initial')->find(request('devicetype'));
                $devicetype = $deviceTypes->initial;

                $queries = Dropdown::select('title')
                            ->where('alias', request('alias'))
                            ->when(request('search', false), function($query) {
                                return $query->where('title', 'like', '%'.request('search').'%');
                            })
                            ->when(request('datascope', false), function($query) use ($devicetype) {
                                return $query->where('device_type', '=', $devicetype);
                            })
                            ->get();

                $response = [];

                foreach($queries as $query){
                    $response[] = array(
                        "id" => $query->title,
                        "text" => $query->title
                    );
                }

                return response()->json($response, 200);
            }

        } catch (\Exception $e) {
            return response()->json('error', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function showValveConditionOnDropdown()
    {
        try {
            if( request('devicetype', false) == false ) {
                return response()->json([
                    'message' => __('formprocess.assessment.dropdown.valvetype.undefined')
                ], 500);
            } else {
                $valveConditionSubjectId = ValveConditionSubject::select('id')
                    ->where([
                        ['device_type_id', '=', request('devicetype')],
                        ['code', '=', request('alias')]
                    ])->first();

                $queries = ValveConditionOption::select('id','health_rating_id','title')
                    ->where([
                        ['device_type_id', '=', request('devicetype')],
                        ['valve_condition_subject_id', '=', $valveConditionSubjectId->id]
                    ])
                    ->get();

                $response = [];

                foreach($queries as $query){
                    $response[] = array(
                        "id" => $query->title,
                        "text" => $query->title
                    );
                }

                return response()->json($response, 200);
            }

        } catch (\Exception $e) {
            return response()->json('error', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function showPotensialCauseOnDropdown()
    {
        try {
            if( request('devicetype', false) == false ) {
                return response()->json([
                    'message' => __('formprocess.assessment.dropdown.valvetype.undefined')
                ], 500);
            } else {
                $valveConditionSubjectId = ValveConditionSubject::select('id','device_type_id')
                    ->where([
                        ['device_type_id', '=', request('devicetype')],
                        ['code', '=', request('alias')]
                    ])->first();

                $queries = PotensialCauseOption::select('id','title')
                    ->where([
                        ['device_type_id', '=', $valveConditionSubjectId->device_type_id],
                        ['valve_condition_subject_id', '=', $valveConditionSubjectId->id]
                    ])
                    ->get();

                $response = [];

                foreach($queries as $query){
                    $response[] = array(
                        "id" => $query->title,
                        "text" => $query->title
                    );
                }

                return response()->json($response, 200);
            }

        } catch (\Exception $e) {
            return response()->json('error', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function showRecommendationOnDropdown()
    {
        try {
            if( request('devicetype', false) == false ) {
                return response()->json([
                    'message' => __('formprocess.assessment.dropdown.valvetype.undefined')
                ], 500);
            } else {
                $valveConditionSubjectId = ValveConditionSubject::select('id')
                    ->where([
                        ['device_type_id', '=', request('devicetype')],
                        ['code', '=', request('alias')]
                    ])->first();

                $queries = RecommendationOption::select('id','title')
                    ->where([
                        ['device_type_id', '=', request('devicetype')],
                        ['valve_condition_subject_id', '=', $valveConditionSubjectId->id]
                    ])
                    ->get();

                $response = [];

                foreach($queries as $query){
                    $response[] = array(
                        "id" => $query->title,
                        "text" => $query->title
                    );
                }

                return response()->json($response, 200);
            }

        } catch (\Exception $e) {
            return response()->json('error', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function edit(Dropdown $dropdown)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dropdown $dropdown)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dropdown  $dropdown
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dropdown $dropdown)
    {
        //
    }
}
