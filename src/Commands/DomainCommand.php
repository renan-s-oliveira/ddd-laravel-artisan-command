<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;

class DomainCommand extends Command
{
    protected $signature = 'domain:method';

    protected $description = 'Cria o sistema de pastas e arquivos para o domínio';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo 'Domain Command';
    }
}
