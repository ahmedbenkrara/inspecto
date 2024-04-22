<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsonFilePath = public_path('custom.json');

        if (File::exists($jsonFilePath)) {
            $jsonData = json_decode(File::get($jsonFilePath), true);
            return view('admin.custom.about', compact('jsonData'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        $jsonFilePath = public_path('custom.json');

        if (File::exists($jsonFilePath)) {
            $jsonData = json_decode(File::get($jsonFilePath), true);

            $jsonData['who'] = $request->who;
            $jsonData['mission'] = $request->mission;
            $jsonData['services'] = $request->services;
            $jsonData['why'] = $request->why;
            $jsonData['why1'] = $request->why1;

            File::put($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

            return back()->with('success', 'La page à propos est mise à jour avec succès.');
        } else {
            abort(404);
        }
    }

    public function social(Request $request)
    {
        $jsonFilePath = public_path('custom.json');

        if (File::exists($jsonFilePath)) {
            $jsonData = json_decode(File::get($jsonFilePath), true);

            $jsonData['facebook'] = $request->facebook;
            $jsonData['instagram'] = $request->instagram;
            $jsonData['linkedin'] = $request->linkedin;
            $jsonData['whatsapp'] = $request->whatsapp;

            File::put($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

            return back()->with('success', 'Liens de réseaux sociaux mis à jour avec succès.');
        } else {
            abort(404);
        }
    }
}
