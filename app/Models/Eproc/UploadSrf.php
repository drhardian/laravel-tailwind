<?php

namespace App\Models\Eproc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadSrf extends Model
{
    use HasFactory;
     
    public function uploadSrfs()
    {
        return $this->hasMany(UploadSrf::class);
    }
    
}

