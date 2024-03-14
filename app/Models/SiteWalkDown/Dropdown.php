<?php

namespace App\Models\SiteWalkDown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dropdown extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'swd_dropdowns';

    /**
     * Get the deviceType that owns the Dropdown
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deviceType(): BelongsTo
    {
        return $this->belongsTo(DeviceType::class, 'device_type', 'initial');
    }
}
