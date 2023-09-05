<?php

namespace App\Http\Controllers\MappingTable;

use App\Http\Controllers\Controller;
use App\Http\Requests\MappingTable\MappingTableStoreRequest;
use App\Models\MappingTable\MappingTable;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MappingTableController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Mapping Tables';
    }

    # to show main page of table map module
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('setup.tablemap.index', [
            'title' => $this->pageTitle,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    # storing new data
    public function store(MappingTableStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            MappingTable::create($request->only('prefix_title','category','description'));

            DB::commit();

            return response()->json([
                'message' => 'Table prefix successfully saved'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # showing existing detail data on edit form
    public function edit(MappingTable $tablemap)
    {
        return response()->json([
            'form' => [
                ['prefix_title', $tablemap->prefix_title],
                ['category', $tablemap->category],
                ['description', $tablemap->description]
            ],
            'update_url' => route('tablemap.update', ['tablemap' => $tablemap->id])
        ], 200);
    }

    # update selected record
    public function update(MappingTableStoreRequest $request, MappingTable $tablemap)
    {
        DB::beginTransaction();

        try {
            $tablemap->update($request->only('prefix_title','category','description'));

            DB::commit();

            return response()->json([
                'message' => 'Table prefix successfully updated'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # delete selected record
    public function destroy(MappingTable $tablemap)
    {
        DB::beginTransaction();

        try {
            $tablemap->delete();

            DB::commit();

            return response()->json([
                'message' => 'Table prefix successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Display a listing of the resource on datatable.
    public function showDatatable()
    {
        $model = MappingTable::select('id', 'prefix_title', 'category', 'description', 'updated_at');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('tablemap.edit', ['tablemap' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="px-2" onclick="deleteRecord(\'' . route('tablemap.destroy', ['tablemap' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->editColumn('description', function ($model) {
                $descriptionFormat = "";
                foreach (explode("\n",$model->description) as $value) {
                    $descriptionFormat = $descriptionFormat."<p>".$value."</p>";
                }

                return $descriptionFormat;
            })
            ->editColumn('updated_at', function ($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions','description'])
            ->make(true);
    }
}
