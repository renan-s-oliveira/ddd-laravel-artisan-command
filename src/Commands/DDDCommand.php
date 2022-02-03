<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;

class DDDCommand extends Command
{
    protected $signature = 'make:ddd {paste}';

    protected $description = 'Cria o sistema de pastas e arquivos para Application';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo 'DDD Command';
    }
}
