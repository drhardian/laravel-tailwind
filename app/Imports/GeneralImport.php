<?php

namespace App\Imports;

use App\Models\PsvMasterData\General;
use Maatwebsite\Excel\Concerns\ToModel;

class GeneralImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new General([
            //
        ]);
    }
}
