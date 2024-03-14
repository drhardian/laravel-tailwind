<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticalityLevel extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    protected $table = 'swd_criticality_levels';

}
