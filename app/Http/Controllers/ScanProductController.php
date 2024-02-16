<?php

namespace App\Http\Controllers;

use App\Models\Catalog\Catalogproduct;
use Illuminate\Http\Request;

class ScanProductController extends Controller
{
    public function index()
    {
        return view('inventory.scanqr.index');
    }

    public function getProductDetail()
    {
        $catalogProduct = Catalogproduct::where('itemcode',request('id'))->first();

        return response()->json([
            'product_description' => $catalogProduct->product_name
        ], 200);
    }
}
