<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Mark;
use App\Models\PriceRange;

class SearchBudgetController extends Controller
{
    public function index(){
        return view('client.search');
    }

    public function brands(){
        $brands = Mark::all();
        return response()->json($brands);
    }

    public function prices(){
        $prices = PriceRange::orderBy('min', 'asc')->get();
        return response()->json($prices);
    }

    public function cars(){
        $all = Car::with('motorisation.modele.mark', 'generation', 'priceranges')->get();

        // // Group cars by generation_id
        // $groupedCars = $all->groupBy('generation_id');

        // // Select the first car from each group
        // $uniqueCars = $groupedCars->map(function ($group) {
        //     return $group->first();
        // });

        // // Shuffle the unique cars
        // $shuffledUniqueCars = $uniqueCars->shuffle();

        // return CarResource::collection($shuffledUniqueCars);
        // $all = Car::with('motorisation.modele.mark', 'generation', 'priceranges')->get();
        // return CarResource::collection($all);
        
        $groupedCars = $all->groupBy(function ($car) {
            return $car->generation_id . '-' . $car->motorisation->type. '-' .$car->motorisation->modele_id;
        });
        
        // Select the first car from each group
        $uniqueCars = $groupedCars->map(function ($group) {
            return $group->first();
        });
        
        // Shuffle the unique cars
        $shuffledUniqueCars = $uniqueCars->shuffle();
        return CarResource::collection($shuffledUniqueCars);
    }
}
