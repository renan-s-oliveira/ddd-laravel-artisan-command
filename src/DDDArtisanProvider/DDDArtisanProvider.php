<?php

namespace DDDArtisan\DDDArtisanProvider;

use DDDArtisan\Commands\DomainCommand;
use DDDArtisan\Commands\SupportCommand;
use Illuminate\Support\ServiceProvider;
use DDDArtisan\Commands\ApplicationCommand;

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
            SupportCommand::class,
            ApplicationCommand::class,
        ]);
    }
}
