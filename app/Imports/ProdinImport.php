<?php

namespace App\Imports;

use App\Models\Catalog\Catalogproduct;
use App\Models\Inventory\Prodin;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdinImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $catalogProduct = Catalogproduct::where([
            ['productmain_code','=',$row['productmain_code']],
            ['product_code','=',$row['product_code']],
            ['productsub_code','=',$row['productsub_code']],
            ['productgroup_code','=',$row['productgroup_code']],
            ['product_name','=',$row['product_name']],
        ])->first();

        if (!$catalogProduct){
  
            if(!empty($row['prodin_datein'])){
                $carbonDate = Carbon::createFromTimestamp(($row['prodin_datein'] - 25569) * 86400);
                $formattedDate = $carbonDate->format('Y-m-d');  
            }else{
                $formattedDate = null;
            }

            return new Prodin([
                    'catalog_product_id' => $catalogProduct->id,
                    'asset_code' => $row['asset_code'],
                    'prodin_actual' => $row['prodin_actual'],
                    'prodin_origin' => $row['prodin_origin'],
                    'prodin_budgetorigin'=> $row['prodin_budgetorigin'],
                    'prodin_noref'=> $row['prodin_noref'],
                    'prodin_datein'=> $row['prodin_datein'],
                    'prodin_owner'=> $row['prodin_owner'],
                    'prodin_supplier' => $row['prodin_supplier'],
                    'prodin_stockin' => $row['prodin_stockin'],
                    'prodin_stockloc' => $row['prodin_stockloc'],
                    'prodin_detailloc' => $row['prodin_detailloc'],
            ]);
        }
    }
}
