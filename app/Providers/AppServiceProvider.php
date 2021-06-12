<?php

namespace App\Providers;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use tizis\laraComments\Policies\CommentPolicy;

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
    public function boot(Charts $charts)
    {

    }
}
