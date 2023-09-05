<?php

namespace App\Imports;

use App\Models\CustomerAsset\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpareUnitValveImport implements ToModel, WithHeadingRow
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
            'product_size' => $row['valve_size_(inch)'],
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
            'product_datein' => Carbon::createFromFormat('d/m/Y',$row['date_in']),
            'product_transfer' => $row['material_transfer'],
            'product_reser' => $row['reservation_number'],
            'product_origin' => $row['ex_station'],
            'product_sdvin' => $row['sdv_in'],
            'product_sdvout' => $row['sdv_out'],
            'product_station' => $row['station'],
            'product_requestor' => $row['requestor'],
            'product_project' => $row['project'],
            'product_dateout' => Carbon::createFromFormat('d/m/Y',$row['date_out']),
            'product_dateoffshore' => Carbon::createFromFormat('d/m/Y',$row['date_to_offshore']),
            'product_tfoffshore' => $row['material_transfer_to_offshore'],
            'product_curloc' => $row['current_location'],
            'product_stockin' => $row['stock_in'],
            'product_docin' => $row['dok_stock_in'],
            'product_stockout' => $row['stock_out'],
            'product_docout' => $row['dok_stock_out'],
            'product_stockqty' => $row['stock_quality'],
            'product_uom' => $row['uom'],
            'product_targetpdn' => Carbon::createFromFormat('d/m/Y',$row['target_pdn']),
            'product_csrelease' => $row['cs_release'],
            'product_csnumber' => $row['cs_number'],
            'product_cenumber' => $row['ce_number'],
            'product_ronumber' => $row['ro_number'],
            'product_startdate' => Carbon::createFromFormat('d/m/Y',$row['start_date']),
            'product_enddate' => Carbon::createFromFormat('d/m/Y',$row['end_date']),
            'product_price' => $row['price_repair'],
            'product_remark' => $row['remark'],
            'product_code' => $row['product_code'],
            'product_image' => '',
        ]);
    }
}
