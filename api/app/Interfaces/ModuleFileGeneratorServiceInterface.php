<?php

namespace App\Interfaces;

class ModuleFile {
    public function __construct(
        public string $name,
        public string $content,
        public string $extension
    )
    {}

}

interface ModuleFileGeneratorServiceInterface {
    public function generate(): ModuleFile;
}