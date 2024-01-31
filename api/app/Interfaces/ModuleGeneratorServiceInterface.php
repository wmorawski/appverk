<?php

namespace App\Interfaces;

use App\Services\ZipGeneratorService;
use App\Services\JavascriptGeneratorService;
use App\Services\HtmlGeneratorService;
use App\Services\CssGeneratorService;

interface ModuleGeneratorServiceInterface
{
    public function __construct(ZipGeneratorService $zipGeneratorService, HtmlGeneratorService $htmlGeneratorService, JavascriptGeneratorService $javascriptGeneratorService, CssGeneratorService $cssGeneratorService);
    public function generate(string $clickout, array $dimensions);
}
