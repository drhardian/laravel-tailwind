<?php

namespace App\Imports;

use App\Models\OnwjPintarAsset;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PintarDataImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        return new OnwjPintarAsset([
            'area' => $row['area'],
            'subarea' => $row['subarea'],
            'platform' => $row['platform'],
            'wellname' => $row['wellname'],
            'controlvalve_mfg' => $row['controlvalve_mfg'],
            'controlvalve_model' => $row['controlvalve_model'],
            'radiocomm_mfg' => $row['radiocomm_mfg'],
            'radiocomm_model' => $row['radiocomm_model'],
            'controller_mfg' => $row['controller_mfg'],
            'controller_model' => $row['controller_model'],
            'serialethconv_mfg' => $row['serialethconv_mfg'],
            'serialethconv_model' => $row['serialethconv_model'],
            'analogserialconv_mfg' => $row['analogserialconv_mfg'],
            'analogserialconv_model' => $row['analogserialconv_model'],
            'pressuretransmitter_mfg' => $row['pressuretransmitter_mfg'],
            'pressuretransmitter_model' => $row['pressuretransmitter_model'],
            'gasflowtransmitter_mfg' => $row['gasflowtransmitter_mfg'],
            'gasflowtransmitter_model' => $row['gasflowtransmitter_model'],
            'oilflowtransmitter_mfg' => $row['oilflowtransmitter_mfg'],
            'oilflowtransmitter_model' => $row['oilflowtransmitter_model'],
            'turbinemeter_mfg' => $row['turbinemeter_mfg'],
            'turbinemeter_size' => $row['turbinemeter_size'],
            'turbinemeter_kfactor' => $row['turbinemeter_kfactor'],
            'battery_mfg' => $row['battery_mfg'],
            'battery_model' => $row['battery_model'],
            'battery_qty' => $row['battery_qty'],
            'solarcell_mfg' => $row['solarcell_mfg'],
            'solarcell_model' => $row['solarcell_model'],
            'solarcell_qty' => $row['solarcell_qty'],
            'chargercontroller_mfg' => $row['chargercontroller_mfg'],
            'chargercontroller_model' => $row['chargercontroller_model'],
            'wellstatus' => $row['wellstatus'],
            'remotesystem' => $row['remotesystem'],
            'modification' => $row['modification'],
            'integritystatus' => $row['integritystatus'],
            'controlvalvestatus' => $row['controlvalvestatus'],
            'rtu' => $row['rtu'],
            'meter' => $row['meter'],
            'powersystem' => $row['powersystem'],
            'lastpm' => $row['lastpm'],
            'defecthighlight' => $row['defecthighlight'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
