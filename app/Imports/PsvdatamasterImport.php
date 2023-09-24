<?php

namespace App\Imports;

use App\Models\PsvMasterData\Psvdatamaster;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class PsvdatamasterImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    // /**
    // * @param array $row
    // *
    // * @return \Illuminate\Database\Eloquent\Model|null
    // */
    public function model(array $row)
    {
        return new Psvdatamaster([
                //General Information
                'id' => $row['id'],
                'area' => $row['area'],
                'flow' => $row['flow_station'],
                'platform' => $row['platform'],
                'tag_number'=> $row['tag_number'],
                'operational'=> $row['operational'],
                'integrity'=> $row['integrity'],
                'cert_date'=> $row['cert_date'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['cert_date']))->format('Y-m-d') : Carbon::make(null),
                'cert_doc'=> $row['certificate_document'],
                'exp_date'=> $row['exp_date'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['exp_date']))->format('Y-m-d') : Carbon::make(null),
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

                //Valve Information
               
                'manufacture' => $row['manufacture'],
                'model_number' => $row['model_number'],
                'serial_number' => $row['serial_number'],
                // 'size_in' => doubleval($row['size_in']),
                'size_in' => $row['size_in'],
                'rating_in' => $row['rating_in'],
                'condi_in' => $row['conection_in'],
                // 'size_out' => doubleval($row['size_out']),
                'size_out' => $row['size_out'],
                'rating_out' => $row['rating_out'],
                'condi_out' => $row['conection_out'],
                // 'press'  => doubleval($row['press_setting']),
                // 'vacuum'  => doubleval($row['vacuum_setting']),
                'press'  => $row['press'],
                'vacuum'  => $row['vacuum'],
                'psv' => $row['psv_style'],
                'design' => $row['orifice_design'],
                // 'selection' => doubleval($row['orifice_selection']),
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
                'year_build' => $row['year_build'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['year_build']))->format('Y') : Carbon::make(null),
                'year_install' => $row['year_install'] ? Carbon::createFromDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['year_install']))->format('Y') : Carbon::make(null),
                //Process Condition
                'service' => $row['service'],
                'equip_number' => $row['equipment_number'],
                'pid' => $row['pid'],
                'size_basic' => $row['size_basic'],
                'size_code' => $row['size_code'],
                'fluid' => $row['fluid'],
                'required' => $row['required_capacity'],
                'capacity_unit' => $row['capacity_unit'],
                // 'mawp' => doubleval($row['mawp']),
                // 'operating_psi' => doubleval($row['operating_pressure']),
                'mawp' => $row['mawp'],
                'operating_psi' => $row['operating_psi'],
                'back_psi' => $row['back_pressure'],
                'operating_temp' => $row['operating_temp'],
                // 'cold_diff' => doubleval($row['cold_diff_test_press']),
                // 'allowable' => intval($row['allowable_over_press']),
                'cold_diff' => $row['cold_diff'],
                'allowable' => $row['allowable'],
                //Condition Replacement
                // 'shutdown' =>  intval($row['shutdown_category']),
                'shutdown' =>  $row['shutdown'],
                'valve_upstream' => $row['isolation_valve_upstream'],
                'condi_upstream' => $row['condition_upstream'],
                'valve_downstream' => $row['isolation_valve_downstream'],
                'condi_downstream' => $row['condition_downstream'],
                'scaffolding' => $row['scaffolding'],
                'spacer_inlet' => $row['use_spacer_inlet'],
                'spacer_outlet' => $row['use_spacer_outlet'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
        ]);
    }
}
