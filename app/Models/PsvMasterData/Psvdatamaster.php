<?php

namespace App\Models\PsvMasterData;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psvdatamaster extends Model
{
    use HasFactory;
    protected $table = 'psvdata_master';
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->cert_date = Carbon::createFromFormat('d/m/Y', request('cert_date'))->format('Y-m-d');
            $model->exp_date = Carbon::createFromFormat('d/m/Y', request('exp_date'))->format('Y-m-d');
            $model->year_build = Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d');
            $model->year_install = Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d');
        });

        static::updating(function ($model) {
            $model->cert_date = Carbon::createFromFormat('d/m/Y', request('cert_date'))->format('Y-m-d');
            $model->exp_date = Carbon::createFromFormat('d/m/Y', request('exp_date'))->format('Y-m-d');
            $model->year_build = Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d');
            $model->year_install = Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d');
        });
        
    }
}
