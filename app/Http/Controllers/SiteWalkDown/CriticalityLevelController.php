<?php

namespace App\Http\Controllers;

use App\Models\SiteWalkDown\CriticalityLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CriticalityLevelController extends Controller
{
    # Display a listing of the resource.
    public function index()
    {
        abort_unless(Gate::allows('criticalitylevel_access'), 403);
    }

    # Show the form for creating a new resource.
    public function create()
    {
        abort_unless(Gate::allows('criticalitylevel_create'), 403);
    }

    # Store a newly created resource in storage.
    public function store(Request $request)
    {
        abort_unless(Gate::allows('criticalitylevel_create'), 403);
    }

    # Display the specified resource.
    public function show($id)
    {
        abort_unless(Gate::allows('criticalitylevel_view'), 403);
    }

    # Show the form for editing the specified resource.
    public function edit($id)
    {
        abort_unless(Gate::allows('criticalitylevel_update'), 403);
    }

    # Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('criticalitylevel_update'), 403);
    }

    # Remove the specified resource from storage.
    public function destroy($id)
    {
        abort_unless(Gate::allows('criticalitylevel_delete'), 403);
    }

    # Display a listing of the resource on selectbox.
    public function showOnDropdown()
    {
        try {
            $queries = CriticalityLevel::select('id','title')
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
}
