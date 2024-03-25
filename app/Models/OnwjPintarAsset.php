<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnwjPintarAsset extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'subarea',
        'platform',
        'wellname',
        'tagnumber',
        'controlvalve_mfg',
        'controlvalve_model',
        'radiocomm_mfg',
        'radiocomm_model',
        'controller_mfg',
        'controller_model',
        'serialethconv_mfg',
        'serialethconv_model',
        'analogserialconv_mfg',
        'analogserialconv_model',
        'pressuretransmitter_mfg',
        'pressuretransmitter_model',
        'gasflowtransmitter_mfg',
        'gasflowtransmitter_model',
        'oilflowtransmitter_mfg',
        'oilflowtransmitter_model',
        'turbinemeter_mfg',
        'turbinemeter_size',
        'turbinemeter_kfactor',
        'battery_mfg',
        'battery_model',
        'battery_qty',
        'solarcell_mfg',
        'solarcell_model',
        'solarcell_qty',
        'chargercontroller_mfg',
        'chargercontroller_model',
        'wellstatus',
        'remotesystem',
        'modification',
        'integritystatus',
        'controlvalvestatus',
        'rtu',
        'meter',
        'powersystem',
        'lastpm',
        'defecthighlight',
        'others'
    ];
}
