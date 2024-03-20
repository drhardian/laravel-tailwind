<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRating extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    protected $table = 'swd_health_ratings';

}
