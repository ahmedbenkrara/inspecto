<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Generation;
use App\Models\Modele;

class GenerationController extends Controller
{
    private $errors = [
        'name.required' => 'Le nom de la génération est requis.',
        'name.string' => 'Le nom de la génération doit être une chaîne.',
        'name.max' => 'Le nom de la génération ne doit pas dépasser :max caractères.',
        'name.unique' => 'Le nom de la génération est déjà pris',
        'modele_id.required' => 'Le champ nom du modèle est obligatoire.',
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generations = Generation::paginate(20);
        return view('admin.generation.list', compact('generations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modeles = Modele::all();
        return view('admin.generation.add', compact('modeles'));
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
            'modele_id' => 'required|integer'
        ],$this->errors);
        //check if exists where(name)
        $generation = Generation::where('name', $request->name)->first();
        
        if(!$generation){
            //create
            $gen = Generation::create([
                'name' => $request->name,
                'modele_id' => $request->modele_id
            ]);

            if($gen){
                //success
                return back()->with('success', 'Génération créée avec succès !');
            }
            //something went wrong
            return back()->with('error', 'Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
        }else{
            //already exists
            return back()->with('error', 'Cette génération existe déjà !');
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
            $generation = Generation::findOrFail($id);
            $modeles = Modele::all();
            return view('admin.generation.edit', compact('generation', 'modeles'));
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
            $generation = Generation::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:generation,name,' . $generation->id,
                'modele_id' => 'required|integer'
            ], $this->errors);

            $generation->update([
                'name' => $request->name,
                'modele_id' => $request->modele_id
            ]);

            return back()->with('success', 'Génération mise à jour avec succès !');
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
            $generation = Generation::findOrFail($id);
            $generation->delete();
            return back()->with('success', 'Génération supprimée avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
