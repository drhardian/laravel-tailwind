<?php

namespace App\Repositories;

use App\Interfaces\DeviceTypeRepositoryInterface;
use App\Models\SiteWalkDown\DeviceType;

class DeviceTypeRepository implements DeviceTypeRepositoryInterface
{
    public static function getDeviceTypeById($id)
    {
        $deviceType = DeviceType::select('initial')->find($id);

        return $deviceType->initial;
    }
}
