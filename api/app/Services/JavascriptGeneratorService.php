<?php

namespace App\Services;

use App\Interfaces\ModuleFile;
use App\Interfaces\ModuleFileGeneratorServiceInterface;

class JavascriptGeneratorService implements ModuleFileGeneratorServiceInterface {
  public function generate($id = "", $clickout = ""): ModuleFile
  {
    $js = "document.querySelector(\"#{$id}\").addEventListener(\"click\", () => {
        window.open(\"{$clickout}\")
      })";
    return new ModuleFile('script', $js, 'js');
  }
}