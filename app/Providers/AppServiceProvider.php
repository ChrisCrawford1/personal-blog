<?php

namespace App\Providers;

use App\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
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
        Blade::if('projectsEnabled', function () {
            return Settings::all()->first()->projects_enabled;
        });

        Blade::if('consentCookieFound', function () {
            return Cookie::get('laravel_cookie_consent') && !Auth::check();
        });
    }
}
