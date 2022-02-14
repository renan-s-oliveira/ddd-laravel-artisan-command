<?php

namespace DDDArtisan\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class DomainDTOCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:domain-dto {domainName} {dtoName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Domain entity based on DDD';

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

        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info('Domain DTO ' . $this->getSingularClassName($this->argument('dtoName')) . ' created successfully.');
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
        return __DIR__ . '/../stubs/domain/dto.stub';
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables()
    {
        return [
            'NAMESPACE'         => "Domain\\" . $this->getSingularClassName($this->argument('domainName')) . "\\DTO",
            'CLASS_NAME'        => $this->getSingularClassName($this->argument('dtoName')),
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path($this->getDirectoryName() . "/Domain") . '/' . $this->getSingularClassName($this->argument('domainName')) . '/DTO/' . $this->getSingularClassName($this->argument('dtoName')) . 'Data.php';
    }
}
