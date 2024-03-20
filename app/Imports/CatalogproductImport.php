<?php

namespace App\Imports;

use App\Models\Catalog\Catalogcodeitem;
use App\Models\Catalog\Catalogproduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Exception;

class CatalogproductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            $catalogProduct = Catalogproduct::where([
                ['productmain_code','=',trim($row['productmain_code'])],
                ['product_code','=',trim($row['product_code'])],
                ['productsub_code','=',trim($row['productsub_code'])],
                ['productgroup_code','=',trim($row['productgroup_code'])],
                ['product_name','=',preg_replace('/\s+/', ' ', trim($row['product_name']))],
            ])->first();

            if (!$catalogProduct) {
                $catalogCode = Catalogcodeitem::select(
                    'main_code',
                    'code',
                    'sub_code',
                    'group_code',
                )->where([
                    ['titlemain_code','=',trim($row['productmain_code'])],
                    ['title_code','=',trim($row['product_code'])],
                    ['titlesub_code','=',trim($row['productsub_code'])],
                    ['titlegroup_code','=',trim($row['productgroup_code'])],
                ])->first();
    
                $getLastItemTotal = Catalogproduct::where([
                    ['productmain_code','=',trim($row['productmain_code'])],
                    ['product_code','=',trim($row['product_code'])],
                    ['productsub_code','=',trim($row['productsub_code'])],
                    ['productgroup_code','=',trim($row['productgroup_code'])],
                ])->count();
    
                $itemcode = $catalogCode->main_code.$catalogCode->code.$catalogCode->sub_code.$catalogCode->group_code.(intval($getLastItemTotal)+1);
                
                return new Catalogproduct([
                        'itemcode' => $itemcode,
                        'product_image' => trim($row['product_image']),
                        'productmain_code' => trim($row['productmain_code']),
                        'product_code'=> trim($row['product_code']),
                        'productsub_code'=> trim($row['productsub_code']),
                        'productgroup_code'=> trim($row['productgroup_code']),
                        'product_name'=> trim($row['product_name']),
                        'product_minstock' => $row['product_minstock'],
                        'product_spec' => trim($row['product_spec']),
                        'product_brand' => trim($row['product_brand']),
                        'product_uom' => trim($row['product_uom']),
                        'product_price'=> $row['product_price'],
                ]);
            }
        } catch (\Exception $e) {
            throw new Exception($row['product_name']);
        }
    }
}
