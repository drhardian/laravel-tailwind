<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;

use App\Models\SiteWalkDown\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    # Display a listing of the resource.
    public function index()
    {
        abort_unless(Gate::allows('company_access'), 403);
    }

    # Show the form for creating a new resource.
    public function create()
    {
        abort_unless(Gate::allows('company_create'), 403);
    }

    # Store a newly created resource in storage.
    public function store(Request $request)
    {
        abort_unless(Gate::allows('company_create'), 403);
    }

    # Display the specified resource.
    public function show($id)
    {
        abort_unless(Gate::allows('company_view'), 403);
    }

    # Show the form for editing the specified resource.
    public function edit($id)
    {
        abort_unless(Gate::allows('company_edit'), 403);
    }

    # Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('company_edit'), 403);
    }

    # Remove the specified resource from storage.
    public function destroy($id)
    {
        abort_unless(Gate::allows('company_delete'), 403);
    }

    # Display a listing of the resource on selectbox.
    public function indexonselectbox()
    {
        $queries = Company::select('id','name')
                    ->when(request('search', false), function($query) {
                        return $query->where('name', 'like', '%'.request('search').'%');
                    })
                    ->get();

        $response = [];

        foreach($queries as $query){
            $response[] = array(
                "id" => $query->id,
                "text" => $query->name
            );
        }

        return response()->json($response);
    }

    # Display a listing of the resource on datatable.
    public function storefromselectbox()
    {
        try {
            $company = Company::select('id','name')
                ->where('name', request('newoption'))
                ->firstOrCreate([
                    'name' => request('newoption')
                ]);

            $setSelected = array(
                "id" => $company->id,
                "text" => $company->name
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
}
