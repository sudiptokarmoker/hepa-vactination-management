<?php

namespace App\Providers;

use App\Interfaces\VaccinationCenterRepositoryInterface;
use App\Repositories\VaccinationCenterRepository;
use Illuminate\Support\ServiceProvider;

class VaccinationCenterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VaccinationCenterRepositoryInterface::class, VaccinationCenterRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
