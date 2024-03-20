<?php

namespace App\Providers;

use App\Interfaces\AreaRepositoryInterface;
use App\Interfaces\AssessmentImageRepositoryInterface;
use App\Interfaces\CompanyPeopleRepositoryInterface;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\CriticalityLevelRepositoryInterface;
use App\Interfaces\DeviceTypeRepositoryInterface;
use App\Interfaces\HealthRatingRepositoryInterface;
use App\Interfaces\ImageRepositoryInterface;
use App\Interfaces\InstructionRepositoryInterface;
use App\Interfaces\OtherAreaRepositoryInterface;
use App\Repositories\AreaRepository;
use App\Repositories\AssessmentImageRepository;
use App\Repositories\CompanyPeopleRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\CriticalityLevelRepository;
use App\Repositories\DeviceTypeRepository;
use App\Repositories\HealthRatingRepository;
use App\Repositories\ImageRepository;
use App\Repositories\InstructionRepository;
use App\Repositories\OtherAreaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InstructionRepositoryInterface::class, InstructionRepository::class);
        $this->app->bind(DeviceTypeRepositoryInterface::class, DeviceTypeRepository::class);
        $this->app->bind(HealthRatingRepositoryInterface::class, HealthRatingRepository::class);
        $this->app->bind(CriticalityLevelRepositoryInterface::class, CriticalityLevelRepository::class);
        $this->app->bind(AreaRepositoryInterface::class, AreaRepository::class);
        $this->app->bind(OtherAreaRepositoryInterface::class, OtherAreaRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(CompanyPeopleRepositoryInterface::class, CompanyPeopleRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(AssessmentImageRepositoryInterface::class, AssessmentImageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
