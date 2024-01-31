<?php

namespace App\Http\Controllers;

use App\Interfaces\ModuleGeneratorServiceInterface;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    private $moduleGeneratorServiceInterface;

    public function __construct(ModuleGeneratorServiceInterface $moduleGeneratorServiceInterface) {
        $this->moduleGeneratorServiceInterface = $moduleGeneratorServiceInterface;
    }

    public function index() {
        $clickout = request()->input('clickout');
        $dimensions = request()->input('dimensions');
        $file = $this->moduleGeneratorServiceInterface->generate($clickout, $dimensions);
        return  response()->download(public_path($file))->deleteFileAfterSend(true);
    }
}
