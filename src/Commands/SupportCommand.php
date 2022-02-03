<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;

class SupportCommand extends Command
{
    protected $signature = 'make:support';

    protected $description = 'Cria o sistema de pastas e arquivos para o support';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo 'Support Command';
    }
}
