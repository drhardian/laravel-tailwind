<?php

namespace App\Models\ValveRepair;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalServices extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "mvrr_optionalservices";

}
