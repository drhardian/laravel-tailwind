<?php

namespace App\Http\Controllers;

use App\Models\SiteWalkDown\Otherarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OtherareaController extends Controller
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
     * Display a listing of the resource on selectbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexonselectbox()
    {
        $companyId = request('companyId');
        $areaId = request('areaId');

        $queries = Otherarea::select('id','title')
                    ->where('company_id', $companyId)
                    ->where('area_id', $areaId)
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
     * Store a newly created resource in storage vie selectbox.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storefromselectbox()
    {
        try {
            $companyId = request('companyId');
            $areaId = request('areaId');
            $newOption = request('newoption');

            if(!DB::table('swd_otherareas')->where([
                ['company_id', '=', $companyId],
                ['area_id', '=', $areaId],
                ['title', '=', $newOption]
            ])->exists() ) {
                $areas = Otherarea::select('id','title')
                            ->where('company_id', $companyId)
                            ->where('area_id', $areaId)
                            ->where('title', $newOption)
                            ->firstOrCreate([
                                'company_id' => $companyId,
                                'area_id' => $areaId,
                                'title' => $newOption
                            ]);

                $update = true;

                $setSelected = array(
                    "id" => $areas->id,
                    "text" => $areas->title
                );
            } else {
                $update = false;
            }

            return response()->json([
                'errors' => 'none',
                'message' => !isset($setSelected)?:$setSelected,
                'updateOption' => $update
            ], 200);
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return response()->json([
                'errors' => 'Error while processing data'
            ], 400);
        }
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
