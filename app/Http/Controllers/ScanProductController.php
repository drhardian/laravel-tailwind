<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanProductController extends Controller
{
    public function index()
    {
        return view('inventory.scanqr.index');
    }

    public function getProductDetail()
    {
        dd(request('id'));
    }
}
