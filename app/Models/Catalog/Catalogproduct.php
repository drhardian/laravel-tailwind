<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Catalogproduct extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'catalog_products';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name',
                'onUpdate' => true
            ]
        ];
    }
    /**
     * Get the activity that owns the Catalogproduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
        public function catalogMainCode()
        {
            return $this->belongsTo(Catalogcodeitem::class, 'main_code', 'titlemain_code');
        }
    
        public function catalogCode()
        {
            return $this->belongsTo(Catalogcodeitem::class, 'catalog_code', 'title_code');
        }
    
        public function catalogSubCode()
        {
            return $this->belongsTo(Catalogcodeitem::class, 'catalogsub_code', 'titlesub_code');
        }
    
        public function catalogGroupCode()
        {
            return $this->belongsTo(Catalogcodeitem::class, 'cataloggroup_code', 'titlegroup_code');
        }

        public function Catalogproduct()
        {
            return $this->belongsToMany(Catalogproduct::class, 'product_name');
        }
    }
    
