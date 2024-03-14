<?php

namespace App\Repositories;

use App\Interfaces\AreaRepositoryInterface;
use App\Models\SiteWalkDown\Area;

class AreaRepository implements AreaRepositoryInterface
{
    public static function getTitleById($id)
    {
        $query = Area::select('title')->find($id);

        return $query->title;
    }
}
