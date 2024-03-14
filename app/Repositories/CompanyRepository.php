<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\SiteWalkDown\Company;

class CompanyRepository implements CompanyRepositoryInterface
{
    public static function getNameById($id)
    {
        $query = Company::select('name')->find($id);

        return $query->name;
    }
}
