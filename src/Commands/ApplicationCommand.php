<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;

class SupportCommand extends Command
{
    protected $signature = 'make:application';

    protected $description = 'Cria o sistema de pastas e arquivos para Application';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo 'Application Command';
    }
}
