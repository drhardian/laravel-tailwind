<?php

namespace App\Http\Controllers;

use App\Models\Contract;

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
}
