<?php

namespace App\Models\Inventory;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodin extends Model
{
    use HasFactory;
    protected $table = 'inventory_prodins';
    protected $guarded = [];
    
//     protected static function boot() {
//         parent::boot();

//         static::creating(function ($model) {
//             // dd([request('request_date')]);
//             $model->request_date = !empty(request('request_date')) ? Carbon::createFromFormat('d/m/Y', request('request_date'))->format('Y-m-d') : null;
//             $model->due_date = !empty(request('due_date')) ? Carbon::createFromFormat('d/m/Y', request('due_date'))->format('Y-m-d') : null;
//             // $model->year_build = !empty(request('year_build')) ? Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d') : null;
//             // $model->year_install = !empty(request('year_install')) ? Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d') : null;
//         });

//         static::updating(function ($model) {
//             $model->request_date = !empty(request('request_date')) ? Carbon::createFromFormat('d/m/Y', request('cert_date'))->format('Y-m-d') : null;
//             $model->due_date = !empty(request('due_date')) ? Carbon::createFromFormat('d/m/Y', request('due_date'))->format('Y-m-d') : null;
//             // $model->year_build = !empty(request('year_build')) ? Carbon::createFromFormat('d/m/Y', request('year_build'))->format('Y-m-d') : null;
//             // $model->year_install = !empty(request('year_install')) ? Carbon::createFromFormat('d/m/Y', request('year_install'))->format('Y-m-d') : null;
//         });

        
//     }
}

