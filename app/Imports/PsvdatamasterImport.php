<?php

namespace App\Imports;

use App\Models\PsvMasterData\Psvdatamaster;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PsvdatamasterImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Psvdatamaster([
                #General Information
                'area' => $row['area'],
                'flow' => $row['flow_station'],
                'platform' => $row['platform'],
                'tag_number'=> $row['tag_number'],
                'operational'=> $row['operational'],
                'integrity'=> $row['integrity'],
                'cert_date'=> !empty($row['cert_date']) ? Carbon::createFromFormat('Y-m-d',$row['cert_date'])->format('Y-m-d'):NULL,
                'cert_doc'=> $row['certificate_document'],
                'exp_date'=> !empty($row['exp_date']) ? Carbon::createFromFormat('Y-m-d',$row['exp_date'])->format('Y-m-d'):NULL,
                'valve_number'=> $row['valve_number'],
                'status' => $row['status_update'],
                'deferal' => $row['deferal'],
                'resetting' => $row['resetting'],
                'resize' => $row['resize'],
                'demolish'=> $row['demolish'],
                'relief' => $row['relief_header'],
                'note' => $row['note'],
                'cert_package'  => $row['cert_package'],
                'klarifikasi' => $row['klarifikasi'],
                'by' => $row['by'],
                #Valve Information
                'manufacture' => $row['manufacture'],
                'model_number' => $row['model_number'],
                'serial_number' => $row['serial_number'],
                'size_in' => $row['size_in'],
                'rating_in' => $row['rating_in'],
                'condi_in' => $row['conection_in'],
                'size_out' => $row['size_out'],
                'rating_out' => $row['rating_out'],
                'condi_out' => $row['conection_out'],
                'press'  => $row['press'],
                'vacuum'  => $row['vacuum'],
                'psv' => $row['psv_style'],
                'design' => $row['orifice_design'],
                'selection' => $row['selection'],
                'psv_capacity' => $row['psv_capacity'],
                'psv_capacityunit' => $row['psv_capacity_unit'],
                'bonnet' => $row['bonnet_type'],
                'seat' => $row['seat_type'],
                'CAP' => $row['cap'],
                'body_bonnet' => $row['body_bonnet_material'],
                'disc_material' => $row['disc_material'],
                'spring_material' => $row['spring_material'],
                'guide_material' => $row['guide_material'],
                'resilient_seat' => $row['resilient_seat'],
                'bellow_material' => $row['bellow_material'],
                'year_build' => $row['year_build'],
                'year_install' => $row['year_install'],
                #Process Condition
                'service' => $row['service'],
                'equip_number' => $row['equipment_number'],
                'pid' => $row['pid'],
                'size_basic' => $row['size_basic'],
                'size_code' => $row['size_code'],
                'fluid' => $row['fluid'],
                'required' => $row['required_capacity'],
                'capacity_unit' => $row['capacity_unit'],
                'mawp' => $row['mawp'],
                'operating_psi' => $row['operating_psi'],
                'back_psi' => $row['back_pressure'],
                'operating_temp' => $row['operating_temp'],
                'cold_diff' => $row['cold_diff'],
                'allowable' => $row['allowable'],
                #Condition Replacement
                'shutdown' =>  $row['shutdown'],
                'valve_upstream' => $row['isolation_valve_upstream'],
                'condi_upstream' => $row['condition_upstream'],
                'valve_downstream' => $row['isolation_valve_downstream'],
                'condi_downstream' => $row['condition_downstream'],
                'scaffolding' => $row['scaffolding'],
                'spacer_inlet' => $row['use_spacer_inlet'],
                'spacer_outlet' => $row['use_spacer_outlet'],
        ]);
    }
}