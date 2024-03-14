<?php

namespace App\Interfaces;

interface HealthRatingRepositoryInterface
{
    public static function getHealthRatingById($request);
    public static function getHealthRatingLevelById($request);
}