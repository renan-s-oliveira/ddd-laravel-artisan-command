<?php

namespace DDDArtisan\DDDArtisanProvider;

use DDDArtisan\Commands\DDDCommand;
use DDDArtisan\Commands\DomainCommand;
use DDDArtisan\Commands\SupportCommand;
use Illuminate\Support\ServiceProvider;
use DDDArtisan\Commands\DomainDTOCommand;
use DDDArtisan\Commands\DDDRequestCommand;
use DDDArtisan\Commands\ApplicationCommand;
use DDDArtisan\Commands\DomainModelCommand;
use DDDArtisan\Commands\DomainActionCommand;

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
            DDDCommand::class,
            DDDRequestCommand::class,
            DomainActionCommand::class,
            DomainDTOCommand::class,
            DomainModelCommand::class,
            
        ]);

        $this->publishes([
            __DIR__.'/../config/dddartisan.php' => config_path('dddartisan.php'),
        ]);
    }
}
