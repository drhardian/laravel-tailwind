<?php

namespace App\Http\Controllers;

use App\Models\SiteWalkDown\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('area_access'), 403);
    }

    /**
     * Display a listing of the resource on selectbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexonselectbox()
    {
        $companyId = request('companyId');

        $queries = Area::select('id','title')
                    ->where('company_id', $companyId)
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
        abort_unless(Gate::allows('area_create'), 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('area_create'), 403);
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
            $newOption = request('newoption');

            $areas = Area::select('id','title')
                        ->where('company_id', $companyId)
                        ->where('title', $newOption)
                        ->firstOrCreate([
                            'company_id' => $companyId,
                            'title' => $newOption
                        ]);

            $setSelected = array(
                "id" => $areas->id,
                "text" => $areas->title
            );

            return response()->json([
                'status' => 200,
                'message' => $setSelected
            ]);
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return response()->json([
                'success' => false,
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
        abort_unless(Gate::allows('area_view'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Gate::allows('area_edit'), 403);
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
        abort_unless(Gate::allows('area_edit'), 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('area_delete'), 403);
    }
}
