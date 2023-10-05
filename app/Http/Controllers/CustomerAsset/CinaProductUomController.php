<?php

namespace App\Http\Controllers\CustomerAsset;

use App\Http\Controllers\Controller;
use App\Models\CustomerAsset\CinaProductUom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CinaProductUomController extends Controller
{
    /**
     * Display a listing of the resource on selectbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOnDropdown()
    {
        $queries = CinaProductUom::select('id','title')
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
     * Store a newly created resource in storage vie selectbox.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromDropdown()
    {
        try {
            $newOption = request('newoption');

            $query = CinaProductUom::select('id','title')
                        ->where('title', $newOption)
                        ->firstOrCreate([
                            'title' => $newOption
                        ]);

            $setSelected = array(
                "id" => $query->id,
                "text" => $query->title
            );

            return response()->json([
                'status' => 'success',
                'message' => $setSelected
            ],200);
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return response()->json([
                'success' => 'failed',
                'errors' => 'Error while processing data'
            ],500);
        }
    }
}
