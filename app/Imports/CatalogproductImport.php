<?php

namespace App\Imports;

use App\Models\Catalog\Catalogcodeitem;
use App\Models\Catalog\Catalogproduct;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CatalogproductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $catalogCode = Catalogcodeitem::select(
            'main_code',
            'code',
            'sub_code',
            'group_code',
        )->where([
            ['titlemain_code','=',$row['productmain_code']],
            ['title_code','=',$row['product_code']],
            ['titlesub_code','=',$row['productsub_code']],
            ['titlegroup_code','=',$row['productgroup_code']],
        ])->first();

        if(!$catalogCode) {
            dd([
                $row['productmain_code'],
                $row['product_code'],
                $row['productsub_code'],
                $row['productgroup_code'],
            ]);
        }

        $getLastItemTotal = Catalogproduct::where([
            ['productmain_code','=',$row['productmain_code']],
            ['product_code','=',$row['product_code']],
            ['productsub_code','=',$row['productsub_code']],
            ['productgroup_code','=',$row['productgroup_code']],
        ])->count();

        $itemcode = $catalogCode->main_code.$catalogCode->code.$catalogCode->sub_code.$catalogCode->group_code.(intval($getLastItemTotal)+1);
        
        return new Catalogproduct([
                'itemcode' => $itemcode,
                'product_image' => $row['product_image'],
                'productmain_code' => $row['productmain_code'],
                'product_code'=> $row['product_code'],
                'productsub_code'=> $row['productsub_code'],
                'productgroup_code'=> $row['productgroup_code'],
                'product_name'=> $row['product_name'],
                'product_minstock' => $row['product_minstock'],
                'product_spec' => $row['product_spec'],
                'product_brand' => $row['product_brand'],
                'product_uom' => $row['product_uom'],
                'product_price'=> $row['product_price'],
        ]);
    }
}
