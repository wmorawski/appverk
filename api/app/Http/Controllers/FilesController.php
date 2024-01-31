<?php

namespace App\Http\Controllers;

use App\Interfaces\ModuleGeneratorServiceInterface;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function __construct(private ModuleGeneratorServiceInterface $moduleGeneratorServiceInterface)
    {
    }

    public function index()
    {
        $clickout = request()->input('clickout');
        $dimensions = request()->input('dimensions');
        $position = request()->input('position');
        $file = $this->moduleGeneratorServiceInterface->generate($clickout, $dimensions, $position);
        return  response()->download(public_path($file))->deleteFileAfterSend(true);
    }
}
