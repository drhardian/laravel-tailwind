<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_assessment_images';

    # Get the assessment that owns the AssessmentImage
    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    # Get the product that owns the AssessmentImage
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
