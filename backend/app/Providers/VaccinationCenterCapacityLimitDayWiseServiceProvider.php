<?php

namespace App\Providers;

use App\Interfaces\VaccinationCenterCapacityLimitDayWiseRepositoryInterface;
use App\Repositories\VaccinationCenterCapacityLimitDayWiseRepository;
use Illuminate\Support\ServiceProvider;

class VaccinationCenterCapacityLimitDayWiseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VaccinationCenterCapacityLimitDayWiseRepositoryInterface::class, VaccinationCenterCapacityLimitDayWiseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
