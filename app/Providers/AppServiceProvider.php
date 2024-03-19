<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\Contracts\TeamRepositoryInterface',
            'App\Repositories\Eloquent\TeamRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\MemberRepositoryInterface',
            'App\Repositories\Eloquent\MemberRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\EventRepositoryInterface',
            'App\Repositories\Eloquent\EventRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\PreferenceRepositoryInterface',
            'App\Repositories\Eloquent\PreferenceRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\ConfigRepositoryInterface',
            'App\Repositories\Eloquent\ConfigRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
