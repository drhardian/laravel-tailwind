<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendationOption extends Model
{
    use HasFactory;

    protected $fillable = ['device_type_id','valve_condition_subject_id','title'];
    protected $table = 'swd_recommendation_options';

}
