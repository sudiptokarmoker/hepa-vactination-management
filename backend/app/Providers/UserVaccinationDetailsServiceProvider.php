<?php

namespace App\Providers;

use App\Interfaces\UserVaccinationDetailsRepositoryInterface;
use App\Repositories\UserVaccinationDetailsRepository;
use Illuminate\Support\ServiceProvider;

class UserVaccinationDetailsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserVaccinationDetailsRepositoryInterface::class, UserVaccinationDetailsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
