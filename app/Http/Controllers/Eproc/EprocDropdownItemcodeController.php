<?php

namespace App\Http\Controllers\Eproc;

use App\Http\Controllers\Controller;
use App\Models\Eproc\EprocDropdownItemcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class EprocDropdownItemcodeController extends Controller
{
     /**
     * Display a listing of the resource on selectbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOnDropdown()
    {
        $queries = EprocDropdownItemcode::select('id','code','title')
                    ->when(request('search', false), function($query) {
                        return $query->where('title', 'like', '%'.request('search').'%');
                    })
                    -> where('dropdown_alias',request('alias'))
                    ->get();

        $response = [];

        foreach($queries as $query){
            $response[] = array(
                "id" => request('dataChange')==="false"?$query->id : $query->title,
                "string" => $query->code,
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

            $query = EprocDropdownItemcode::select('id','code','title')
                        ->where('code', $newOption)
                        ->where('dropdown_alias', request('alias'))
                        ->firstOrCreate([
                            'code' => $newOption,
                            'title' => $newOption,
                            'dropdown_alias' => request('alias')
                        ]);

            $setSelected = array(
                "id" => $query->id,
                "string" => $query->code,
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
