<?php

namespace App\Http\Controllers\RequestOrder;

use App\Http\Requests\RequestOrder\ContractStoreRequest;
use App\Models\RequestOrder\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Contract';
        $this->pageProfile = 'Profile';
    }

    # Display a details of the resource.
    public function show(Contract $contract)
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $contract->client->name,
                'status' => 'active',
                'url' => route('client.show', $contract->client_id),
                'icon' => '',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('request_order.contract.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle,
            'contract' => $contract
        ]);
    }

    # Display a listing of the resource as cards.
    public static function showAsCards($clientId)
    {
        $contracts = [];

        $queries = Contract::with('requestorders')->where('client_id', $clientId)->get();

        if( count($queries) > 0 ) {
            foreach ($queries as $contract) {
                $contracts[] = [
                    'contractNumber' => $contract->contract_number,
                    'contractTitle' => $contract->description,
                    'contractDetails' => $contract->details,
                    'contractPeriod' => Carbon::parse($contract->start_date)->format('d/m/Y').' - '.Carbon::parse($contract->end_date)->format('d/m/Y'),
                    'detailLink' => route('contract.show', $contract->id),
                    'editLink' => route('contract.edit', ['contract' => $contract->id]),
                    'deleteLink' => $contract->requestorders->count() == 0 ? route('contract.destroy', ['contract' => $contract->id]) : '',
                ];
            }
        }

        return $contracts;
    }

    # storing new data
    public function store(ContractStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            Contract::create($request->only('client_id','contract_number','description','start_date','end_date','details'));

            DB::commit();

            return response()->json([
                'message' => 'New contract successfully saved'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Show the form for editing the specified resource.
    public function edit(Contract $contract)
    {
        return response()->json([
            'form' => [
                ['contract_number', $contract->contract_number],
                ['description', $contract->description],
                ['start_date', Carbon::parse($contract->start_date)->format('d/m/Y')],
                ['end_date', Carbon::parse($contract->end_date)->format('d/m/Y')],
                ['details', $contract->details],
            ],
            'update_url' => route('contract.update', ['contract' => $contract->id])
        ], 200);
    }

    # updating data
    public function update(ContractStoreRequest $request, Contract $contract)
    {
        DB::beginTransaction();

        try {
            $contract->update($request->only('client_id','contract_number','description','start_date','end_date','details'));

            DB::commit();

            return response()->json([
                'message' => 'Contract successfully updated'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # delete record from table based on primary key
    public function destroy(Contract $contract)
    {
        DB::beginTransaction();

        try {
            $contract->delete();

            DB::commit();

            return response()->json([
                'message' => 'Contract successfully deleted',
                'cardId' => $contract->contract_number
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    # Display a listing of the resource on selectbox.
    public function showOnDropdown()
    {
        $queries = Contract::with('client:id,name')
            ->select(
                'client_contract.id',
                'client_contract.contract_number',
                'client_contract.description',
                'client_contract.start_date',
                'client_contract.end_date',
                'client_contract.client_id'
            )
            ->when(request('search', false), function ($query) {
                $query->where('client_contract.contract_number', request('search'))
                ->orWhere(function($q) {
                    $q->whereHas('client', function($q) {
                        $q->where('name', 'like', '%' . request('search') . '%');
                    })
                    ->orWhere('client_contract.description', 'like', '%' . request('search') . '%');
                });
            })
            ->get();

        $response = [];

        foreach ($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->contract_number,
                "client" => $query->client->name,
                "description" => $query->description,
                "startdate" => Carbon::parse(strtotime($query->start_date))->format('d/m/Y'),
                "enddate" => Carbon::parse(strtotime($query->end_date))->format('d/m/Y'),
            );
        }

        return response()->json($response);
    }

    public static function getClientIdByContractNumber($contractNumber)
    {
        $client = Contract::select('client_id')->find($contractNumber);

        return $client->client_id;
    }
}
