<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityRating extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_priority_ratings';

}
