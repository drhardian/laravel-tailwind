<?php

namespace App\Repositories;

use App\Interfaces\CompanyPeopleRepositoryInterface;
use App\Models\SiteWalkDown\CompanyPerson;

class CompanyPeopleRepository implements CompanyPeopleRepositoryInterface
{
    public static function getAllById($id)
    {
        $query = CompanyPerson::select('name','title','email')->find($id);

        if($query !== null) {
            return [
                'name' => $query->name,
                'title' => $query->title,
                'email' => $query->email,
            ];
        } else {
            return [
                'name' => null,
                'title' => null,
                'email' => null,
            ];
        }
    }
}
