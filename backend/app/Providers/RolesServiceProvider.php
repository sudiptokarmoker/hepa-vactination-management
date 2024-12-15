<?php

namespace App\Providers;

use App\Interfaces\RolesRepositoryInterface;
use App\Repositories\RolesRepository;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RolesRepositoryInterface::class, RolesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
