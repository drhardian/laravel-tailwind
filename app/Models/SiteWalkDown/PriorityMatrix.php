<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriorityMatrix extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_priority_matrix';


    /**
     * Get the priority rating that owns the PriorityMatrix
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priorityRating(): BelongsTo
    {
        return $this->belongsTo(PriorityRating::class);
    }
}
