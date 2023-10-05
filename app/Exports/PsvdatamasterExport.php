<?php

namespace App\Exports;

use App\Models\PsvMasterData\Psvdatamaster;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PsvdatamasterExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            //General Information
            // 'id',
            'area',
            'flow_station',
            'platform',
            'tag_number',
            'operational',
            'integrity',
            'cert_date',
            'certificate_document',
            'exp_date',
            'valve_number',
            'status_update',
            'deferal',
            'resetting',
            'resize',
            'demolish',
            'relief_header',
            'note',
            'cert_package',
            'klarifikasi',
            'by',

            //Valve Information
           
            'manufacture',
            'model_number',
            'serial_number',
            'size_in',
            'rating_in',
            'conection_in',
            'size_out',
            'rating_out',
            'conection_out',
            'press',
            'vacuum',
            'psv_style',
            'orifice_design',
            'selection',
            'psv_capacity',
            'psv_capacity_unit',
            'bonnet_type',
            'seat_type',
            'cap',
            'body_bonnet_material',
            'disc_material',
            'spring_material',
            'guide_material',
            'resilient_seat',
            'bellow_material',
            'year_build',
            'year_install',
            //Process Condition
            'service',
            'equipment_number',
            'pid',
            'size_basic',
            'size_code',
            'fluid',
            'required_capacity',
            'capacity_unit',
            'mawp',
            'operating_psi',
            'back_pressure',
            'operating_temp',
            'cold_diff',
            'allowable',
            //Condition Replacement
            'shutdown',
            'isolation_valve_upstream',
            'condition_upstream',
            'isolation_valve_downstream',
            'condition_downstream',
            'scaffolding',
            'use_spacer_inlet',
            'use_spacer_outlet',
            // 'created_at',
            // 'updated_at',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Psvdatamaster::all();
    }
}
