<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempImage extends Model
{
    use HasFactory;

    protected $fillable = ['assessment_id','subject_id','file_initial_name','file_name','path'];
    protected $table = 'swd_temp_images';

}
