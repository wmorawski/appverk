<?php

namespace App\Services;

use App\Interfaces\ModuleGeneratorServiceInterface;

class TypoModuleService implements ModuleGeneratorServiceInterface
{
  public function __construct(public ZipGeneratorService $zipGeneratorService, public HtmlGeneratorService $htmlGeneratorService, public JavascriptGeneratorService $javascriptGeneratorService, public CssGeneratorService $cssGeneratorService)
  {
  }

  public function generate($clickout, $dimensions)
  {
    $html = $this->htmlGeneratorService->generate('modules.typo', ['title' => 'Typo module', 'content' => request()->input('content')]);
    $js = $this->javascriptGeneratorService->generate('typo-module', $clickout);
    $css = $this->cssGeneratorService->generate('typo-module', $dimensions);
    $zip = $this->zipGeneratorService->generate([$html, $js, $css]);
    return $zip;
  }
}
