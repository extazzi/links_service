<?php

namespace App\Providers;

use App\Services\Links\Providers\LinkCustomProvider;
use App\Services\Links\Providers\LinkProviderInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LinkProviderInterface::class, LinkCustomProvider::class);

    }
}
