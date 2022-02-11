<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DDDCommand extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ddd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default DDD structure';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDirectoryName()
    {
        return config('dddartisan.base_path');
    }

    protected function resolve($pathname)
    {
        mkdir(base_path('/') . $pathname);
        mkdir(base_path("/$pathname/Domain"));
        mkdir(base_path("/$pathname/Application"));
        mkdir(base_path("/$pathname/Support"));
        Artisan::call('make:ddd-request');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rootDDD = $this->getDirectoryName();
        $this->resolve($rootDDD);

        echo "\033[" . '0;32m' . "DDD structure created successfully." . "\033[0m";
        echo "\n\nDo not forget to add these paths to your composer.json in autoload < psr-4:\n";
        echo "    {\n";
        echo "        \"Application\\\\\": \"$rootDDD/Application\",\n";
        echo "        \"Domain\\\\\": \"$rootDDD/Domain\",\n";
        echo "        \"Support\\\\\": \"$rootDDD/Support\",\n";
        echo "    }\n";

    }
}
