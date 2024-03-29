<?php

namespace App\Models\Catalog;

use App\Models\Inventory\Prodin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalogproduct extends Model
{
    use HasFactory;

    protected $table = 'catalog_products';
    protected $guarded = [];

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'product_name',
    //             'onUpdate' => true
    //         ]
    //     ];
    // }
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

        /**
         * Get all of the productInStocks for the Catalogproduct
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function productInStocks(): HasMany
        {
            return $this->hasMany(Prodin::class, 'foreign_key', 'local_key');
        }
    }
    
