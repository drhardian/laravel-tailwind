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
            // dd([request('cert_date')]);
            $model->cert_date = !empty(request('cert_date')) ? Carbon::createFromFormat('d/m/Y', request('cert_date'))->format('Y-m-d') : null;
            $model->exp_date = !empty(request('exp_date')) ? Carbon::createFromFormat('d/m/Y', request('exp_date'))->format('Y-m-d') : null;
            // $model->year_build = !empty(request('year_build')) ? Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d') : null;
            // $model->year_install = !empty(request('year_install')) ? Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d') : null;
        });

        static::updating(function ($model) {
            $model->cert_date = !empty(request('cert_date')) ? Carbon::createFromFormat('d/m/Y', request('cert_date'))->format('Y-m-d') : null;
            $model->exp_date = !empty(request('exp_date')) ? Carbon::createFromFormat('d/m/Y', request('exp_date'))->format('Y-m-d') : null;
            // $model->year_build = !empty(request('year_build')) ? Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d') : null;
            // $model->year_install = !empty(request('year_install')) ? Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d') : null;
        });

        
    }
}
