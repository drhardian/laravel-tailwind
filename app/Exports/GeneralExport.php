<?php

namespace App\Exports;

use App\Models\PsvMasterData\General;
use Maatwebsite\Excel\Concerns\FromCollection;

class GeneralExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return General::all();
    }
}
