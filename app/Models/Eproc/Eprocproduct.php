<?php

namespace App\Models\Eproc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Eprocproduct extends Model
{
    use HasFactory;
    protected $table = 'eproc_products';
    protected $guarded = [];

    /**
     * Get the activity that owns the Eprocproduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
        public function productMainCode()
        {
            return $this->belongsTo(Eprocitemcode::class, 'productmain_code', 'titlemain_code');
        }
    
        public function productCode()
        {
            return $this->belongsTo(Eprocitemcode::class, 'product_code', 'title_code');
        }
    
        public function productSubCode()
        {
            return $this->belongsTo(Eprocitemcode::class, 'productsub_code', 'titlesub_code');
        }
    
        public function productGroupCode()
        {
            return $this->belongsTo(Eprocitemcode::class, 'productgroup_code', 'titlegroup_code');
        }
}
