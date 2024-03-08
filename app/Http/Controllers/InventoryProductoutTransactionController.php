<?php

namespace App\Http\Controllers;

use App\Models\InventoryProductoutTransaction;
use App\Http\Requests\StoreInventoryProductoutTransactionRequest;
use App\Http\Requests\UpdateInventoryProductoutTransactionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryProductoutTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryProductoutTransactionRequest $request)
    {
        DB::beginTransaction();

        try {
            $documentNumber = "INVO/" . date('Y') . "/" . InventoryProductoutTransaction::max('id');

            InventoryProductoutTransaction::create([
                'document_number' => $documentNumber,
                'request_date' => $request->request_date,
                'productout_date' => $request->productout_date,
                'requested_by' => $request->requested_by,
                'approved_by' => $request->approved_by,
                'status' => $request->status
            ]);

            DB::commit();

            return redirect()->route('inventory-productout-transactions.index')->with('success', 'Data has been saved');
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
        //
    }
}
