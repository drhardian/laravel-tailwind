<?php

namespace App\Models\PsvMasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;
    protected $table = 'psvdata_process';
    protected $guarded = [];
}
