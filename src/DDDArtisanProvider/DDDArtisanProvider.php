<?php

namespace DDDArtisan\DDDArtisanProvider;

use DDDArtisan\Commands\DomainCommand;
use Illuminate\Support\ServiceProvider;

class DDDArtisanProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        $this->commands([
            DomainCommand::class,
        ]);
    }
}
