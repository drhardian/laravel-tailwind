<?php

namespace App\Http\Controllers;

use App\Models\SiteWalkDown\HealthRating;
use Illuminate\Http\Request;

class HealthRatingController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
            $queries = HealthRating::select('id','title')
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
            return response()->json('error', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
