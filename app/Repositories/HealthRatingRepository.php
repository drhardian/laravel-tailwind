<?php

namespace App\Repositories;

use App\Interfaces\HealthRatingRepositoryInterface;
use App\Models\SiteWalkDown\HealthRating;

class HealthRatingRepository implements HealthRatingRepositoryInterface
{
    public static function getHealthRatingById($request)
    {
        return HealthRating::select('title')->find($request);
    }

    public static function getHealthRatingLevelById($request)
    {
        return HealthRating::select('title')->where('level', $request)->first();
    }
}
