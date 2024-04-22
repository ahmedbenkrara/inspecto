<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Modele;
use App\Models\Generation;
use App\Models\Motorisation;
use App\Models\ProblemType;
use App\Models\Problem;
use App\Models\Solution;
use App\Models\Car;
use App\Models\Request as Demande;
use Illuminate\Support\Facades\File;


class DiagnosticController extends Controller
{
    public function modeles(){
        $models = Modele::all();
        return response()->json($models);
    }

    public function motorisations(){
        $motor = Motorisation::all();
        return response()->json($motor);
    }

    public function generations(){
        $generation = Generation::all();
        return response()->json($generation);
    }

    public function problemTypes(){
        $types = ProblemType::all();
        return response()->json($types);
    }

    public function problems(){
        $problems = Problem::all();
        return response()->json($problems);
    }

    public function solutions(){
        $solutions = Solution::all();
        return response()->json($solutions);
    }

    public function submitDiagnostics(Request $request){
        $generation = $request->generation;
        $motorisation = $request->motorisation;
        $phone = $request->phone;
        $fname = $request->fname;
        $problem = $request->problem;

        $car = Car::where([['motorisation_id', $motorisation], ['generation_id', $generation]])->first();

        if($car){
            $req = Demande::create([
                'car_id' => $car->id,
                'phone' => $phone,
                'fname' => $fname,
                'problem_id' => $problem
            ]);

            if(!$req){
                return response()->json('error');
            }
        }

        $jsonFilePath = public_path('custom.json');
        $jsonData = json_decode(File::get($jsonFilePath), true);

        //whatsapp
        return response()->json($jsonData['whatsapp']);
    }
}
