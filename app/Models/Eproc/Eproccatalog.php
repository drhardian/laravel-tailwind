<?php

namespace App\Models\Eproc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eproccatalog extends Model
{
    use HasFactory;
    protected $table = 'eproc_catalogs';
    protected $guarded = [];
    protected $fillable = [
        'catalogmain_code',
        'catalog_code',
        'catalogsub_code',
        'cataloggroup_code',
        'catalog_desc',
        'catalog_spec',
        'catalog_brand',
        'catalog_uom',
        'catalog_qty',
        'catalog_image',
        'catalog_price'
    ];
}
