<?php

namespace App\Services;

use App\Interfaces\ModuleFile;

class ZipGeneratorService {
    
     /**
     * @param ModuleFile[] $files
     */
      public function generate($files)
      {
        $zip = new \ZipArchive();
        $zip->open('module.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        foreach ($files as $file) {
            $zip->addFromString("{$file->name}.{$file->extension}", $file->content);
        }
        $zip->close();
        return 'module.zip';
      }
}