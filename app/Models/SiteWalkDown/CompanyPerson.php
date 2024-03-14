<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPerson extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_company_people';

}
