<?php

namespace App\Models\Eproc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eprocitemcode extends Model
{
    use HasFactory;
    protected $table = 'eproc_itemcodes';
    protected $guarded = [];
}
