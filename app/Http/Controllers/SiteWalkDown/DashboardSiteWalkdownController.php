<?php

namespace App\Http\Controllers\SiteWalkdown;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSiteWalkdownController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Dashboard SiteWalkdown';
    }
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'sitewalkdown',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
        ];

        return view('sitewalkdown.dashboard.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }
}
