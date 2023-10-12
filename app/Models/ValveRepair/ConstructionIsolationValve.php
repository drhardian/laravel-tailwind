<?php

namespace App\Models\ValveRepair;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionIsolationValve extends Model
{
    use HasFactory;
    protected $table = "mvrr_construction";
    protected $guarded = [];
}
