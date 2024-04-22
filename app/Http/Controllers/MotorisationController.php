<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Modele;
use App\Models\Motorisation;

class MotorisationController extends Controller
{
    private $errors = [
        'name.required' => 'Le nom de la motorisation est requis.',
        'name.string' => 'Le nom de la motorisation doit être une chaîne.',
        'name.max' => 'Le nom de la motorisation ne doit pas dépasser :max caractères.',
        'modele_id.required' => 'Le champ nom du modèle est obligatoire.',
        'type.required' => 'Le type de motorisation est requis.',
        'type.string' => 'Le type de motorisation doit être une chaîne.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorisations = Motorisation::paginate(20);
        return view('admin.motorisation.list', compact('motorisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modeles = Modele::all();
        return view('admin.motorisation.add', compact('modeles'));
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
            'name' => 'required|string|max:255',
            'tyoe' => 'required|string',
            'modele_id' => 'required|integer'
        ],$this->errors);
        //check if exists where(name, modele_id)
        $motorisation = Motorisation::where('name', $request->name)
        ->where('modele_id', $request->modele_id)
        ->first();
        
        if(!$motorisation){
            //create
            $mot = Motorisation::create([
                'name' => $request->name,
                'type' => $request->type,
                'modele_id' => $request->modele_id
            ]);

            if($mot){
                //success
                return back()->with('success', 'Motorisation créée avec succès !');
            }
            //something went wrong
            return back()->with('error', 'Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
        }else{
            //already exists
            return back()->with('error', 'Cette motorisation existe déjà avec le même modèle !');
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
            $motorisation = Motorisation::findOrFail($id);
            $modeles = Modele::all();
            return view('admin.motorisation.edit', compact('motorisation', 'modeles'));
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
            $found = Motorisation::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'type' => 'required|string',
                'modele_id' => 'required|integer'
            ],$this->errors);
            //check if exists where(name, modele_id)
            $motorisation = Motorisation::where('name', $request->name)
            ->where('modele_id', $request->modele_id)
            ->where('id', '<>', $id)
            ->first();
            
            if(!$motorisation){
                //update
                $mot = $found->update([
                    'name' => $request->name,
                    'type' => $request->type,
                    'modele_id' => $request->modele_id
                ]);
    
                if($mot){
                    //success
                    return back()->with('success', 'Motorisation mise à jour avec succès !');
                }
                //something went wrong
                return back()->with('error', 'Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
            }else{
                //already exists
                return back()->with('error', 'Cette motorisation existe déjà avec le même modèle !');
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
            $motorisation = Motorisation::findOrFail($id);
            $motorisation->delete();
            return back()->with('success', 'Motorisation supprimée avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
