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
        $file = $this->moduleGeneratorServiceInterface->generate($clickout, $dimensions);
        return  response()->download(public_path($file))->deleteFileAfterSend(true);
    }
}
