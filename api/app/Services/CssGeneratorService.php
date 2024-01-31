<?php

namespace App\Services;

use App\Interfaces\ModuleFile;
use App\Interfaces\ModuleFileGeneratorServiceInterface;

class CssGeneratorService implements ModuleFileGeneratorServiceInterface {
  public function generate($id = "", $dimensions = [], $backgroundColor = "#FF9B00"): ModuleFile
  {
    $properties = [
        '.container' => ['position' => 'relative', 'width' => '320px', 'height' => '480px', 'border' => 'solid #3E454B 2px'],
        "#{$id}" => ['position' => 'absolute', 'top' => "{$dimensions['top']}%", 'left' => "{$dimensions['left']}%", 'width' => "{$dimensions['width']}%", 'height' => "{$dimensions['height']}%", 'background-color' => $backgroundColor, 'cursor' => 'pointer']
    ];
    $css = $this->transformProperties($properties);

    return new ModuleFile('style', $css, 'css');
  }

  private function transformProperties($properties) {
    $transformedProperties = [];
    
    foreach ($properties as $selector => $property) {
        if(is_array($property)) {
            $transformedProperties[] = $selector . ' {';
            $transformedProperties[] = $this->transformProperties($property);
            $transformedProperties[] = '}';
        } else {
            $transformedProperties[] = "\t" . $selector . ': ' . $property . ';';
        }
    }

    return implode("\n", $transformedProperties);
  }
}