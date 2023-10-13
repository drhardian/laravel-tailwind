<?php

namespace App\Http\Controllers;

use App\Models\DropdownOptionItemcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class DropdownOptionItemcodeController extends Controller
{
     /**
     * Display a listing of the resource on selectbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOnDropdown()
    {
        $queries = DropdownOptionItemcode::select('id','code','title')
                    ->when(request('search', false), function($query) {
                        return $query->where('title', 'like', '%'.request('search').'%');
                    })
                    -> where('dropdown_alias',request('alias'))
                    ->get();

        $response = [];

        foreach($queries as $query){
            $response[] = array(
                "id" => request('dataChange')==="false"?$query->id:$query->title,
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

            $query = DropdownOptionItemcode::select('id','code','title')
                        ->where('title', $newOption)
                        ->where('dropdown_alias', request('alias'))
                        ->firstOrCreate([
                            'title' => $newOption,
                            'dropdown_alias' => request('alias')
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
