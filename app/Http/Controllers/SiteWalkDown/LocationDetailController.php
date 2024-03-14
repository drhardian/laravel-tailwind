<?php

namespace App\Http\Controllers;

use App\Models\SiteWalkDown\LocationDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LocationDetailController extends Controller
{
    public function showOnDropdown()
    {
        try {
            $queries = LocationDetail::select('id','title')
                        ->where('location_type_id', request('locationType'))
                        ->when(request('search', false), function($query) {
                            return $query->where('title', 'like', '%'.request('search').'%');
                        })
                        ->get();

            $response = [];

            foreach($queries as $query){
                $response[] = array(
                    "id" => $query->id,
                    "text" => $query->title
                );
            }

            return response()->json($response, 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => 'Error while processing data'
            ], 400);
        }
    }

    public function storeFromDropdown()
    {
        DB::beginTransaction();

        try {
            $locationType = request('locationType');
            $newOption = request('newoption');

            $areas = LocationDetail::select('id','title')
                        ->where('location_type_id', $locationType)
                        ->where('title', $newOption)
                        ->firstOrCreate([
                            'location_type_id' => $locationType,
                            'title' => $newOption
                        ]);

            $setSelected = array(
                "id" => $areas->id,
                "text" => $areas->title
            );

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => $setSelected
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'errors' => 'Error while processing data'
            ], 400);
        }
    }
}
