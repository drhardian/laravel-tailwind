<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryProductoutTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['document_number','request_date','productout_date','requested_by','approved_by','status'];

    /**
     * Get the requestedBy that owns the InventoryProductoutTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'requested_by', 'id');
    }

    /**
     * Get the approvedBy that owns the InventoryProductoutTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'approved_by', 'id');
    }
}
