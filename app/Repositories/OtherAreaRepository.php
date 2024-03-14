<?php

namespace App\Repositories;

use App\Interfaces\OtherAreaRepositoryInterface;
use App\Models\SiteWalkDown\Otherarea;

class OtherAreaRepository implements OtherAreaRepositoryInterface
{
    public static function getTitleById($id)
    {
        $query = Otherarea::select('title')->find($id);

        return $query->title;
    }
}
