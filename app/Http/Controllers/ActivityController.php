<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Models\Activity;
use App\Models\ActivityUnitrate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Activities';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('request_order.activity.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    public function store(ActivityStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $activity = Activity::create($request->only('activity_code', 'activity_name'));

            foreach ($request->unit_rate_id as $unit_rate_id) {
                ActivityUnitrate::create([
                    'unit_rate_id' => $unit_rate_id,
                    'activity_code' => $activity->id
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Activity successfully saved'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Show the form for editing the specified resource.
    public function edit(Activity $activity)
    {
        $unitRates = [];
        $activityUnitRates = ActivityUnitrate::with('unitrate')->where('activity_code',$activity->id)->get();

        foreach ($activityUnitRates as $activityUnitRate) {
            $unitRates[] = [
                $activityUnitRate->unit_rate_id, $activityUnitRate->unitrate->rate_name
            ];
        }

        return response()->json([
            'activity' => [
                [ 'activity_code', $activity->activity_code ],
                [ 'activity_name', $activity->activity_name ]
            ],
            'activity_unitrate' => $unitRates,
            'update_url' => route('activity.update', ['activity' => $activity->id])
        ], 200);
    }

    # updating data
    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        DB::beginTransaction();

        try {
            $activity->update($request->only('activity_code','activity_name'));

            ActivityUnitrate::where('activity_code', $activity->id)->delete();

            foreach ($request->unit_rate_id as $unit_rate_id) {
                ActivityUnitrate::create([
                    'unit_rate_id' => $unit_rate_id,
                    'activity_code' => $activity->id
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Activity successfully updated'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());            

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # delete record from table based on primary key
    public function destroy(Activity $activity)
    {
        DB::beginTransaction();

        try {
            $activity->delete();

            ActivityUnitrate::where('activity_code', $activity->id)->delete();

            DB::commit();

            return response()->json([
                'message' => 'Activity successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Display a listing of the resource on selectbox.
    public function showOnDropdown()
    {
        $queries = Activity::select('id', 'activity_name')
            ->when(request('search', false), function ($query) {
                $query->where('activity_name', 'like', '%' . request('search') . '%');
            })
            ->get();

        $response = [];

        foreach ($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->activity_name,
            );
        }

        return response()->json($response);
    }

    public function showDatatable()
    {
        $model = Activity::select('id', 'activity_code', 'activity_name', 'updated_at');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '';
                $edit = '<a href="#" class="px-2" onclick="editActivityRecord(\'' . route('activity.edit', ['activity' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteActivityRecord(\'' . route('activity.destroy', ['activity' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
