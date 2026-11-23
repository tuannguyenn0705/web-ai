<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        $defaultHost = strtolower((string) parse_url((string) config('app.url', 'http://localhost'), PHP_URL_HOST));

        if ($defaultHost === '' || filter_var($defaultHost, FILTER_VALIDATE_IP)) {
            $defaultHost = 'localhost';
        } elseif (str_starts_with($defaultHost, 'www.')) {
            $defaultHost = substr($defaultHost, 4);
        }

        URL::defaults(['base_domain' => $defaultHost]);
    }
}
