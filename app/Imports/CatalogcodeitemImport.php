<?php

namespace App\Imports;

use App\Models\Catalog\Catalogcodeitem;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CatalogcodeitemImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $catalogCode = Catalogcodeitem::where([
            ['titlemain_code','=',$row['titlemain_code']],
            ['title_code','=',$row['title_code']],
            ['titlesub_code','=',$row['titlesub_code']],
            ['titlegroup_code','=',$row['titlegroup_code']],
        ])->get();

        if ($catalogCode->count()==0){
            return new Catalogcodeitem([
                'main_code' => $row['main_code'],
                'titlemain_code' => $row['titlemain_code'],
                'code'=> $row['code'],
                'title_code'=> $row['title_code'],
                'sub_code'=> $row['sub_code'],
                'titlesub_code'=> $row['titlesub_code'],
                'group_code'=> $row['group_code'],
                'titlegroup_code'=> $row['titlegroup_code'],
        ]);
        }

        
    }
}
