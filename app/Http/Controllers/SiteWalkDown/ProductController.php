<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;

use App\Models\SiteWalkDown\InstructionTagnum;
use App\Models\SiteWalkDown\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
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

    # Show the form for creating a new resource.
    public function create()
    {
        //
    }

    # Store a newly created resource in storage.
    public function store(Request $request)
    {
        if($request->validated()) {

        }
    }

    # Display the specified resource.
    public function show($id)
    {
        //
    }

    # Show the form for editing the specified resource.
    public function edit($id)
    {
        //
    }

    # Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        //
    }

    # Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }

    # Display a listing of the resource on selectbox.
    public function tagsOnSelectbox()
    {
        $queries = DB::table('swd_products')
            ->select('swd_products.id','swd_products.tagnum')
            ->leftJoin('swd_companies', 'swd_products.company_id', '=', 'swd_companies.id')
            ->when(request('area'), function ($query) {
                return $query->leftJoin('swd_areas', 'swd_products.area_id', '=', 'swd_areas.id');
            })
            ->where('swd_products.company_id', request('company'))
            // ->when(request('otherarea'), function ($query) {
            //     return $query->whereIn('products.otherareas', request('otherarea'));
            // })
            ->get();

        $response = [];

        foreach($queries as $query){
            $response[] = array(
                "id" => $query->id,
                "text" => $query->tagnum
            );
        }

        return response()->json($response);
    }

    # Product by instruction table
    public function tagsByInstruction()
    {
        $instructionId = request('instructionId');

        $query = InstructionTagnum::select('tagnumber')->where('instruction_id', $instructionId);

        return DataTables::of($query)
            ->editColumn('tagnumber', function ($query) {
                return '<a class="btn btn-sm btn-orange mr-2" href="#" onclick="$(\'#tagnum\').val(\'' . $query->tagnumber . '\'); $(\'#taglistmodal\').modal(\'toggle\');"><i class="fa-solid fa-right-to-bracket"></i></a>'.$query->tagnumber;
            })
            ->rawColumns(['tagnumber'])
            ->make(true);
    }

    # Product by instruction table
    public function tagsByProduct()
    {
        $query = Product::select('id','tagnum');

        return DataTables::of($query)
            ->addColumn('tagnumber', function ($query) {
                return '<a class="btn btn-sm btn-orange mr-2" href="#" onclick="$(\'#tagnum\').val(\'' . $query->tagnum . '\'); $(\'#productid\').val(\'' . $query->id . '\'); $(\'#taglistmodal\').modal(\'toggle\');"><i class="fa-solid fa-right-to-bracket"></i></a>'.$query->tagnum;
            })
            ->removeColumn('id')
            ->rawColumns(['tagnumber'])
            ->make(true);
    }
}
