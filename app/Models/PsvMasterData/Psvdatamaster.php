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
}
