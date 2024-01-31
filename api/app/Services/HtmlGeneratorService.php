<?php

namespace App\Services;

use App\Interfaces\ModuleFile;
use App\Interfaces\ModuleFileGeneratorServiceInterface;

class HtmlGeneratorService implements ModuleFileGeneratorServiceInterface {
  public function generate($view = 'welcome', $data = []): ModuleFile
  {
    $html = view($view, $data)->render();
    return new ModuleFile('index', $html, 'html');
  }
}