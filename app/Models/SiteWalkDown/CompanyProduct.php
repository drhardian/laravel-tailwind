<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_company_product';

    /**
     * Get the company that owns the CompanyProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the area that owns the CompanyProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the otherarea that owns the CompanyProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function otherarea(): BelongsTo
    {
        return $this->belongsTo(Otherarea::class);
    }

    /**
     * Get the product that owns the CompanyProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
