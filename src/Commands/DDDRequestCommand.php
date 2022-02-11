<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class DDDRequestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ddd-request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a base Request on Application folder';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->files->isDirectory(dirname($path)) or $this->files->makeDirectory(dirname($path), 0777, true);

        $contents = file_get_contents($this->getStubPath());

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info('Request file created successfully.');
        } else {
            $this->info("File : {$path} already exits");
        }
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

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/application/core/request.stub';
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path($this->getDirectoryName() . "\\Application\\Core\\") . 'Request.php';
    }
}
