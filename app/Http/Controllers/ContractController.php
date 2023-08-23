<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Carbon\Carbon;

class ContractController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Contract';
        $this->pageProfile = 'Profile';
    }

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

        return view('contract.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle,
            'contract' => $contract
        ]);
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
