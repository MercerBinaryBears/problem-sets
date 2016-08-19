<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('pdf', function($path, $name = null) {
            if($name === null) {
                $name = basename($path, '.pdf') . '.pdf';
            }

            return Response::make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $name . '"'
            ]);
        });

        view()->composer(['administrator::layouts.default'], function($view) {
            $view->js[] = asset('build/js/admin-toggle-button.js');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
