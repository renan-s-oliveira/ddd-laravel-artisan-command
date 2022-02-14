<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DomainCommand extends Command
{
    protected $signature = 'make:domain {name}';

    protected $description = 'Cria o sistema de pastas e arquivos para o domínio';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->resolve();
    }

    protected function getDirectoryName()
    {
        return config('dddartisan.base_path');
    }

    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords($name);
    }

    protected function resolve()
    {
        $name = $this->getSingularClassName($this->argument('name'));

        Artisan::call('make:domain-dto ' . $name . " " . $name . "Data");
        Artisan::call('make:domain-action ' . $name . " " . "Create$name");
        Artisan::call('make:domain-model ' . $name . " " . $name);
    }
}
