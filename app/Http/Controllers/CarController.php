<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Mark;
use App\Models\Modele;
use App\Models\Generation;
use App\Models\Motorisation;
use App\Models\PriceRange;
use App\Models\Car;

class CarController extends Controller
{
    private $errors = [
        'image.required' => 'L\'image est requise.',
        'modele_id.required' => 'le modèle est obligatoire.',
        'modele_id.integer' => 'le modèle doit être un entier.',
        'motorisation_id.required' => 'La motorisation est nécessaire.',
        'motorisation_id.integer' => 'La motorisation devrait être un nombre entier.',
        'prices.required' => 'Le prix est obligatoires.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(20);
        return view('admin.cars.list', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Mark::all();
        $modeles = Modele::all();
        $generations = Generation::all();
        $motos = Motorisation::all();
        $prices = PriceRange::all();
        return view('admin.cars.add', compact('brands', 'modeles', 'generations', 'motos', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'mark_id' => 'required|integer',
            'modele_id' => 'required|integer',
            'motorisation_id' => 'required|integer',
            'prices' => 'required',
        ],$this->errors);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images/cars',$imagename);

        $car = Car::create([
            'image' => 'images/cars/'.$imagename,
            'motorisation_id' => $request->motorisation_id,
            'generation_id' => $request->generation_id
        ]);

        if($car){
            $car->priceranges()->sync($request->prices);
            return back()->with('success', 'Voiture créée avec succès !');
        }else{
            return back()->with('fail', 'Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $car = Car::findOrFail($id);
            $brands = Mark::all();
            $modeles = Modele::all();
            $generations = Generation::all();
            $motos = Motorisation::all();
            $prices = PriceRange::all();
            return view('admin.cars.edit', compact('car', 'brands', 'modeles', 'generations', 'motos', 'prices'));
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        try{
            $car = Car::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'mark_id' => 'required|integer',
                'modele_id' => 'required|integer',
                // 'motorisation_id' => 'required|integer',
                'prices' => 'required',
            ],$this->errors);
    
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            
            if($request->image != null){
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images/cars',$imagename);
                $img = 'images/cars/'.$imagename;
            }else{
                $img = $car->image;
            }
    
            $car->update([
                'image' => $img,
                // 'motorisation_id' => $request->motorisation_id,
                'generation_id' => $request->generation_id
            ]);
            
            $ids = Motorisation::where('modele_id', $request->modele_id)->select('id')->get();
            Car::where('generation_id', $request->generation_id)->whereIn('motorisation_id', $ids)->update(['image' => $img]);
    
            if($car){
                $car->priceranges()->detach();
                $car->priceranges()->sync($request->prices);
                return back()->with('success', 'Voiture mise à jour avec succès!');
            }else{
                return back()->with('fail', 'Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
            }
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $car = Car::findOrFail($id);
            $car->delete();
            return back()->with('success', 'Voiture supprimée avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
