<?php

namespace App\Models\Eproc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eprocproduct extends Model
{
    use HasFactory;
    protected $table = 'eproc_products';
    protected $guarded = [];
}
