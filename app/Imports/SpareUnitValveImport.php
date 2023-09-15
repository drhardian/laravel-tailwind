<?php

namespace App\Imports;

use App\Models\CustomerAsset\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SpareUnitValveImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    public function model(array $row) 
    {
        return new Product([
            'product_status' => $row['status'],
            'product_assetID' => $row['old_id'],
            'product_newassetID' => $row['new_id'],
            'product_equip' => $row['equipment'],
            'product_type' => $row['valve_type'],
            'product_end' => $row['end_connection'],
            'product_size' => doubleval($row['valve_size']),
            'product_rating' => $row['valve_rating'],
            'product_brand' => $row['valve_brand'],
            'product_valvemodel' => $row['valve_model'],
            'product_serial' => $row['serial_number'],
            'product_condi' => $row['valve_condition'],
            'product_actbrand' => $row['actuator_brand'],
            'product_acttype' => $row['actuator_type'],
            'product_actsize' => $row['actuator_size'],
            'product_fail' => $row['fail_position'],
            'product_actcond' => $row['actuator_condition'],
            'product_posbrand' => $row['positioner_brand'],
            'product_posmodel' => $row['positioner_model'],
            'product_inputsignal' => $row['input_signal'],
            'product_poscond' => $row['positioner_condition'],
            'product_other' => $row['other_accessories'],
            'product_datein' => $row['date_in'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_in']))->format('Y-m-d') : Carbon::make(null),
            'product_transfer' => $row['material_transfer'],
            'product_reser' => $row['reservation_number'],
            'product_origin' => $row['ex_station'],
            'product_sdvin' => $row['sdv_in'],
            'product_sdvout' => $row['sdv_out'],
            'product_station' => $row['station'],
            'product_requestor' => $row['requestor'],
            'product_project' => $row['project'],
            'product_dateout' => $row['date_out'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_out']))->format('Y-m-d') : Carbon::make(null),
            'product_dateoffshore' => $row['date_to_offshore'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_to_offshore']))->format('Y-m-d') : Carbon::make(null),
            'product_tfoffshore' => $row['material_transfer_to_offshore'],
            'product_curloc' => $row['current_location'],
            'product_stockin' => intval($row['stock_in']),
            'product_docin' => $row['dok_stok_in'],
            'product_stockout' => intval($row['stock_out']),
            'product_docout' => $row['dok_stok_out'],
            'product_stockqty' => intval($row['stock_quality']),
            'product_uom' => $row['uom'],
            'product_targetpdn' => $row['target_pdn'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['target_pdn']))->format('Y-m-d') : Carbon::make(null),
            'product_csrelease' => $row['cs_release'],
            'product_csnumber' => $row['cs_number'],
            'product_cenumber' => $row['ce_number'],
            'product_ronumber' => $row['ro_number'],
            'product_startdate' => $row['start_date'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_date']))->format('Y-m-d') : Carbon::make(null),
            'product_enddate' => $row['end_date'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['end_date']))->format('Y-m-d') : Carbon::make(null),
            'product_price' => floatval($row['price_repair']),
            'product_remark' => $row['remark'],
            'product_code' => $row['product_code'],
            'product_image' => '',
        ]);
    }
}
