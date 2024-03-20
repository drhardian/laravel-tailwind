<?php

namespace App\Imports;

use App\Models\Catalog\Catalogproduct;
use App\Models\Inventory\Prodin;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Exception;

class ProdinImport implements ToModel, WithHeadingRow
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
                ['product_name','=',trim($row['product_name'])],
            ])->first();

            if ($catalogProduct) {
                $checkExistingProductId = Prodin::where('catalog_product_id', $catalogProduct->id)->first();

                if(!$checkExistingProductId) {
                    return new Prodin([
                            'catalog_product_id' => $catalogProduct->id,
                            'asset_code' => trim($row['asset_code']),
                            'prodin_actual' => trim($row['prodin_actual']),
                            'prodin_origin' => trim($row['prodin_origin']),
                            'prodin_budgetorigin'=> trim($row['prodin_budgetorigin']),
                            'prodin_noref'=> trim($row['prodin_noref']),
                            'prodin_datein'=> trim($row['prodin_datein']),
                            'prodin_owner'=> trim($row['prodin_owner']),
                            'prodin_supplier' => trim($row['prodin_supplier']),
                            'prodin_stockin' => trim($row['prodin_stockin']),
                            'prodin_stockloc' => trim($row['prodin_stockloc']),
                            'prodin_detailloc' => trim($row['prodin_detailloc']),
                    ]);
                }
            }
        } catch (\Exception $e) {
            throw new Exception($row['product_spec']);
        }

    }
}
