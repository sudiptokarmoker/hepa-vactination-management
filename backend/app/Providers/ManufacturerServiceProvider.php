<?php

namespace App\Providers;

use App\Interfaces\ManufacturerRepositoryInterface;
use App\Repositories\ManufacturerRepository;
use Illuminate\Support\ServiceProvider;

class ManufacturerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ManufacturerRepositoryInterface::class, ManufacturerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
