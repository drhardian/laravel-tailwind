<?php

namespace App\Imports;

use App\Models\FiregasAsset;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FiregasDataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // print_r(Carbon::createFromFormat('d/m/Y',strtotime($row['startup']))->format('Y-m-d').'<br/>');

        // return new FiregasAsset([
        //     'area' => $row['area'],
        //     'subarea' => $row['subarea'],
        //     'platform' => $row['platform'],
        //     'pm_activity_schedule' => $row['pm_activity_schedule'],
        //     'tagnumber' => $row['tagno'],
        //     'sensorlocation' => $row['sensor_location'],
        //     'equipment_type' => $row['equipment'],
        //     'asset_type' => $row['type'], #nullable
        //     'manufacturer' => $row['manufacture'], #nullable
        //     'modelnumber' => $row['modelno'], #nullable
        //     'partnumber' => $row['partno'], #nullable
        //     'serialnumber' => $row['serialno'], #nullable
        //     'startup' => empty($row['startup']) ? '': Carbon::createFromFormat('d/m/Y',strtotime($row['startup']))->format('Y-m-d'), #nullable
        //     'lastexecution' => empty($row['lastexecution']) ? '': Carbon::createFromFormat('d/m/Y',strtotime($row['lastexecution']))->format('Y-m-d'), #nullable
        //     'totalhours' => $row['totalhours'], #nullable
        //     'numberoftagfailures' => $row['no_of_failures_tag'], #nullable
        //     'numberofserialfailures' => $row['no_of_failures_serial'], #nullable
        //     'testinterval' => $row['test_interval'], #nullable
        //     'failurerate' => $row['failure_rate'], #nullable
        //     'pfd' => $row['pfd'], #nullable
        //     'integritystatus' => $row['integrity_status'],
        //     'defecthighlight' => $row['defect_highlight'], #nullable
        //     'remarks' => $row['remark'], #nullable
        // ]);

        if (is_numeric($row['startup'])) {
            // Convert Excel date to Unix timestamp
            $unixTimestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row['startup']);
            $date = Carbon::createFromTimestamp($unixTimestamp);

            // Check if it's a valid date
            if ($date->isValid()) {
                // It's an Excel date, and $date now contains the Carbon instance
                $dateofbirth = $date->format('Y-m-d');
            }
        } else {
            // Check if it's a valid date in the yyyy-mm-dd format
            $date = Carbon::createFromFormat('Y-m-d', $row['startup'], 'UTC');

            // Check if it's a valid date
            if ($date->isValid()) {
                // It's a text-formatted date, and $date now contains the Carbon instance
                $dateofbirth = $date->format('Y-m-d');
            }
        }

        print_r($dateofbirth.'<br/>');
    }
}
