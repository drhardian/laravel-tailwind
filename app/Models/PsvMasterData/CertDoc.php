<?php

namespace App\Models\PsvMasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertDoc extends Model
{
    use HasFactory;
    
    public function certDocs()
    {
        return $this->hasMany(CertDoc::class);
    }
    
}
