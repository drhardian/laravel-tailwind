<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;

use App\Models\SiteWalkDown\LocationType;

class LocationTypeController extends Controller
{
    public function showOnDropdown()
    {
        $queries = LocationType::select('id','title')
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

        return response()->json($response);
    }
}
