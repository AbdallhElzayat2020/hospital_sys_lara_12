<?php

namespace App\Providers;

use App\Interfaces\DoctorInterface;
use App\Interfaces\InsuranceInterface;
use App\Interfaces\SectionInterface;
use App\Interfaces\Services\SingleServiceInterface;
use App\Repositories\DoctorRepository;
use App\Repositories\InsuranceRepository;
use App\Repositories\SectionRepository;
use App\Repositories\Services\SingleServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionInterface::class, SectionRepository::class);
        $this->app->bind(SingleServiceInterface::class, SingleServiceRepository::class);
        $this->app->bind(DoctorInterface::class, DoctorRepository::class);
        $this->app->bind(InsuranceInterface::class, InsuranceRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
