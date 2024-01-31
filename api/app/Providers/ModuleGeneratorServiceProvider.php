<?php

namespace App\Providers;

use App\Enums\GeneratableModule;
use App\Http\Controllers\FilesController;
use App\Interfaces\ModuleGeneratorServiceInterface;
use App\Services\BackgroundModuleService;
use App\Services\TypoModuleService;
use App\Services\ZipGeneratorService;
use App\Services\HtmlGeneratorService;
use App\Services\JavascriptGeneratorService;
use App\Services\CssGeneratorService;
use Illuminate\Support\ServiceProvider;

class ModuleGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(FilesController::class)
            ->needs(ModuleGeneratorServiceInterface::class)
            ->give(function () {
                $module = request()->input('module');
                switch ($module) {
                    case GeneratableModule::BACKGROUND:
                        return new BackgroundModuleService(new ZipGeneratorService(), new HtmlGeneratorService(), new JavascriptGeneratorService(), new CssGeneratorService());
                    case GeneratableModule::TYPO:
                        return new TypoModuleService(new ZipGeneratorService(), new HtmlGeneratorService(), new JavascriptGeneratorService(), new CssGeneratorService());
                    default:
                        throw new \Exception('Module not found');
                };
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
