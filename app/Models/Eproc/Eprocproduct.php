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
        public function eprocMainCode()
        {
            return $this->belongsTo(Eproccodeitem::class, 'main_code', 'titlemain_code');
        }
    
        public function eprocCode()
        {
            return $this->belongsTo(Eproccodeitem::class, 'eproc_code', 'title_code');
        }
    
        public function eprocSubCode()
        {
            return $this->belongsTo(Eproccodeitem::class, 'epprocsub_code', 'titlesub_code');
        }
    
        public function eprocGroupCode()
        {
            return $this->belongsTo(Eproccodeitem::class, 'epprocgroup_code', 'titlegroup_code');
        }
}
