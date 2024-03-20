<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiregasSummaryDetector extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'description',
        'total_tag',
        'major_defect',
        'minor_defect',
        'good_condition',
        'integrity'
    ];
}
