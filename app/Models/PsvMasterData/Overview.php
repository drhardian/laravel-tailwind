<?php

namespace App\Models\PsvMasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;
    protected $table = 'psvdata_overview';
    protected $guarded = [];
}
