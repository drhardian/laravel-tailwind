<?php

namespace App\Imports;

use App\Models\OnwjAutomationcontrolAsset;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AutomationcontrolImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        if (!empty($row['installation_date'])) {
            if (is_numeric($row['installation_date'])) {
                // Convert Excel date to Unix timestamp
                $unixTimestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row['installation_date']);
                $date = Carbon::createFromTimestamp($unixTimestamp);

                // Check if it's a valid date
                if ($date->isValid()) {
                    // It's an Excel date, and $date now contains the Carbon instance
                    $date_installation = $date->format('Y-m-d');
                }
            } else {
                // Check if it's a valid date in the yyyy-mm-dd format
                $date = Carbon::createFromFormat('Y-m-d', $row['installation_date'], 'UTC');

                // Check if it's a valid date
                if ($date->isValid()) {
                    // It's a text-formatted date, and $date now contains the Carbon instance
                    $date_installation = $date->format('Y-m-d');
                }
            }
        } else {
            $date_installation = null;
        }

        return new OnwjAutomationcontrolAsset([
            'area' => $row['area'],
            'subarea' => $row['subarea'],
            'platform' => $row['platform'],
            'description' => $row['description'],
            'asset_type' => $row['asset_type'],
            'plc_brand' => $row['plc_brand'],
            'plc_controller' => $row['plc_controller'],
            'ows_os' => $row['ows_os'],
            'ows_brand' => $row['ows_brand'],
            'ews_os' => $row['ews_os'],
            'ews_brand' => $row['ews_brand'],
            'software_hmi' => $row['software_hmi'],
            'software_config' => $row['software_config'],
            'installation_date' => $date_installation,
            'operation_type' => $row['operation_type'],
            'integritystatus' => $row['integritystatus'],
            'plc_status' => $row['plc_status'],
            'hmi_status' => $row['hmi_status'],
            'ews_server_status' => $row['ews_server_status'],
            'ups_status' => $row['ups_status'],
            'environment_status' => $row['environment_status'],
            'notes' => $row['notes']
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
