<?php

namespace App\Http\Controllers;

use App\Models\InventoryProductoutTransaction;
use App\Http\Requests\StoreInventoryProductoutTransactionRequest;
use App\Http\Requests\UpdateInventoryProductoutTransactionRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class InventoryProductoutTransactionController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Stock Product Out';
        $this->pageProfile = 'Stock Product Out';
    }

    /**
     * Display a listing of the resource.
     */
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

        return view('inventory.prodout.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            [
                'title' => 'Overview',
                'status' => 'active',
                'url' => route('inventory.prodout.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'New Product Out',
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('inventory.prodout.create', [
            'breadcrumbs' => $breadcrumbs,
            'title' => 'New Product Out'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryProductoutTransactionRequest $request)
    {
        DB::beginTransaction();

        try {
            $documentNumber = "INVO/" . date('Y') . "/" . (InventoryProductoutTransaction::count() + 1);

            InventoryProductoutTransaction::create([
                'document_number' => $documentNumber,
                'request_date' => Carbon::createFromFormat('d/m/Y', $request->date_request)->format('Y-m-d'),
                'productout_date' => Carbon::createFromFormat('d/m/Y', $request->date_out)->format('Y-m-d'),
                'requested_by' => $request->requested_by,
                'approved_by' => $request->approved_by,
                'status' => 1
            ]);

            DB::commit();

            return redirect()->route('inventory.product.out.index')->with('success', 'Data has been saved');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save data',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryProductoutTransaction $inventoryProductoutTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryProductoutTransaction $inventoryProductoutTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryProductoutTransactionRequest $request, InventoryProductoutTransaction $inventoryProductoutTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryProductoutTransaction $inventoryProductoutTransaction)
    {
        DB::beginTransaction();

        try {
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
    }

    public function showDatatable()
    {
        $model = InventoryProductoutTransaction::with('requestedBy')->with('approvedBy');

        return DataTables::of($model)
            ->addColumn('actions', function ($model) {
                $show = '<a href="' . route('inventory.prodout.show', [$model->id]) . '"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('inventory.prodout.edit', ['prodout' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('inventory.prodout.destroy', ['prodout' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">' .
                    $show . $edit . $delete .
                    '</div>';

                return $actions;
            })
            ->addColumn('expanded', function () {
                return '';
            })
            ->editColumn('request_date', function ($model) {
                return Carbon::parse($model->request_date)->format('d/m/Y');
            })
            ->editColumn('productout_date', function ($model) {
                return Carbon::parse($model->productout_date)->format('d/m/Y');
            })
            ->addColumn('requested_by', function ($model) {
                return $model->requestedBy->name;
            })
            ->addColumn('approved_by', function ($model) {
                return $model->approvedBy->name;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
