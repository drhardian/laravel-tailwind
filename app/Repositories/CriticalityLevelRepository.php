<?php

namespace App\Repositories;

use App\Interfaces\CriticalityLevelRepositoryInterface;
use App\Models\SiteWalkDown\CriticalityLevel;

class CriticalityLevelRepository implements CriticalityLevelRepositoryInterface
{
    public static function getCriticalityLevelById($id)
    {
        $query = CriticalityLevel::select('title')->find($id);

        return $query->title;
    }
}
