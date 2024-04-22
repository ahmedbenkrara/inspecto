<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Modele;
use App\Models\Mark;


class ModeleController extends Controller
{
    private $errors = [
        'name.required' => 'Le champ Nom de modèle est obligatoire.',
        'name.string' => 'Le nom de modèle doit être une chaîne.',
        'name.max' => 'Le nom de modèle ne doit pas dépasser :max caractères.',
        'name.unique' => 'Le nom de modèle est déjà pris.',
        'mark_id.required' => 'Le champ nom de marque est obligatoire.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles = Modele::paginate(20);
        return view('admin.modele.list', compact('modeles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = Mark::all();
        return view('admin.modele.add', compact('marks'));
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
            'name' => 'required|string|max:255|unique:modele',
            'mark_id' => 'required|integer'
        ],$this->errors);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $modele = Modele::create([
            'name' => $request->name,
            'mark_id' => $request->mark_id
        ]);

        if($modele){
            return back()->with('success', 'Modèle créée avec succès !');
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
            $marks = Mark::all();
            $modele = Modele::findOrFail($id);
            return view('admin.modele.edit', compact('modele', 'marks'));
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
            $modele = Modele::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:modele,name,' . $modele->id,
                'mark_id' => 'required|integer'
            ], $this->errors);

            $modele->update([
                'name' => $request->name,
                'mark_id' => $request->mark_id
            ]);

            return back()->with('success', 'Modèle mis à jour avec succès !');
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
            $modele = Modele::findOrFail($id);
            $modele->delete();
            return back()->with('success', 'Modèle supprimé avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
