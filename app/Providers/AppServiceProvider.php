<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('layouts.app', 'app-layout');
        Blade::component('components.dropdown', 'dropdown');
        Blade::component('components.dropdown-link', 'dropdown-link');
        Blade::component('components.nav-link', 'nav-link');
        Blade::component('components.responsive-nav-link', 'responsive-nav-link');
        Blade::component('components.input-label', 'input-label');
        Blade::component('components.text-input', 'text-input');
        Blade::component('components.input-error', 'input-error');
        Blade::component('components.primary-button', 'primary-button');
    }
}
