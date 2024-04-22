<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {
        $jsonFilePath = public_path('custom.json');

        if (File::exists($jsonFilePath)) {
            $jsonData = json_decode(File::get($jsonFilePath), true);
        }else{
            $jsonData = null;
        }
        return view('client.about', compact('jsonData'));
    }
}
