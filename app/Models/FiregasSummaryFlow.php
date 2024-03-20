<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiregasSummaryFlow extends Model
{
    use HasFactory;
    protected $fillable = [
        'flow_location',
        'total_tag',
        'major_defect',
        'minor_defect',
        'good_condition',
        'integrity',
    ];
}
