<?php

namespace App\Services;

use App\Interfaces\ModuleGeneratorServiceInterface;

class BackgroundModuleService implements ModuleGeneratorServiceInterface
{
    public function __construct(public ZipGeneratorService $zipGeneratorService, public HtmlGeneratorService $htmlGeneratorService, public JavascriptGeneratorService $javascriptGeneratorService, public CssGeneratorService $cssGeneratorService)
    {
    }

    public function generate($clickout, $dimensions, $position)
    {
        $html = $this->htmlGeneratorService->generate('modules.background', ['title' => 'Background module']);
        $js = $this->javascriptGeneratorService->generate('background-module', $clickout);
        $css = $this->cssGeneratorService->generate('background-module', $dimensions, $position, request()->input('color'));
        $zip = $this->zipGeneratorService->generate([$html, $js, $css]);
        return $zip;
    }
}
