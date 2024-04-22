<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Mark;
use App\Models\Modele;
use App\Models\Generation;
use App\Models\Motorisation;
use App\Models\PriceRange;
use App\Models\Car;

class DataController extends Controller
{
    public function uploadForm()
    {
        return view('data');
    }

    public function processExcel(Request $request)  
    {

        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();

        for ($i = 1; $i < count($data); $i++) {
            
            $row = $data[$i];
            
            if(!isset($row)){
                continue;
            }
                
            $brandName = isset($row[0]) ? $row[0] : null;
            $modeleName = isset($row[1]) ? $row[1] : null;
            $generationName = isset($row[2]) ? $row[2] : null;
            $essencePriceRange = isset($row[3]) ? $row[3] : null;
            $dieselPriceRange = isset($row[4]) ? $row[4] : null;
            $electriquePriceRange = isset($row[5]) ? $row[5] : null;
            $hybridPriceRange = isset($row[6]) ? $row[6] : null;
            $essenceMotorisations = isset($row[7]) ? explode(' - ', $row[7]) : [];
            $dieselMotorisations = isset($row[8]) ? explode(' - ', $row[8]) : [];
            $electriqueMotorisations = isset($row[9]) ? explode(' - ', $row[9]) : [];
            $hybridMotorisations = isset($row[10]) ? explode(' - ', $row[10]) : [];
            $imageLink = '/images/cars/1696889559.jpg';

            if(!$brandName){
                continue;
            }
                
            $brand = Mark::firstOrCreate(['name' => $brandName]);
            $modele = Modele::firstOrCreate(['name' => $modeleName, 'mark_id' => $brand->id]);
            $generation = $generationName ? Generation::firstOrCreate(['name' => $generationName, 'modele_id' => $modele->id]) : null;

            foreach ($essenceMotorisations as $motorisationName) {
                
                if(empty($essencePriceRange)){
                    continue;
                }

                $motorisation = Motorisation::updateOrCreate([
                    'type' => 'essence',
                    'name' => $motorisationName,    
                    'modele_id' => $modele->id,
                ]);

                $priceRange = $this->getPriceRange($essencePriceRange);
                
                $car = new Car();
                $car->motorisation_id = $motorisation->id;
                $car->generation_id = $generation ? $generation->id : null;
                $car->image = $imageLink;   
                $car->save();
                
                $car->priceranges()->attach($priceRange);
                
            }
            
            foreach ($dieselMotorisations as $motorisationName) {

                if(empty($dieselPriceRange)){
                    continue;
                }
                
                $motorisation = Motorisation::updateOrCreate([
                    'type' => 'diesel',
                    'name' => $motorisationName,
                    'modele_id' => $modele->id,  
                ]);

                $priceRange = $this->getPriceRange($dieselPriceRange);
                
                $car = new Car();
                $car->motorisation_id = $motorisation->id;
                $car->generation_id = $generation ? $generation->id : null;
                $car->image = $imageLink;
                $car->save();
                
                $car->priceranges()->attach($priceRange);

            }

            foreach ($electriqueMotorisations as $motorisationName) {

                if(empty($electriquePriceRange)){
                    continue;
                }
                
                $motorisation = Motorisation::updateOrCreate([
                    'type' => 'electrique',
                    'name' => $motorisationName,   
                    'modele_id' => $modele->id,
                ]);

                $priceRange = $this->getPriceRange($electriquePriceRange);
                
                $car = new Car();
                $car->motorisation_id = $motorisation->id;
                $car->generation_id = $generation ? $generation->id : null;
                $car->image = $imageLink;
                $car->save();
                
                $car->priceranges()->attach($priceRange);

            }
            
            foreach ($hybridMotorisations as $motorisationName) {

                if(empty($hybridPriceRange)){
                    continue;
                }
                
                $motorisation = Motorisation::updateOrCreate([
                    'type' => 'hybrid',
                    'name' => $motorisationName,
                    'modele_id' => $modele->id,   
                ]);

                $priceRange = $this->getPriceRange($hybridPriceRange);
                
                $car = new Car();
                $car->motorisation_id = $motorisation->id;
                $car->generation_id = $generation ? $generation->id : null;
                $car->image = $imageLink;
                $car->save();
                
                $car->priceranges()->attach($priceRange);

            }

        }

        return 'Processed';
    }

    public function getPriceRange($priceRangeStr)
    {

        if ($priceRangeStr) {

            list($min, $max) = explode('-', $priceRangeStr);

            $minPriceM = floor($min / 10000) . 'M';
            $maxPriceM = floor($max / 10000) . 'M';
            $name = "$minPriceM-$maxPriceM";

            $existing = PriceRange::where('name', $name)->first();
            if ($existing) {
            return $existing;
            }

            $priceRange = new PriceRange();
            $priceRange->name = $name;
            $priceRange->min = $min;
            $priceRange->max = $max;
            $priceRange->save();

            return $priceRange;
        }
    }
}