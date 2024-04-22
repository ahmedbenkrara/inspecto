<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MarkController extends Controller
{
    private $errors = [
        'name.required' => 'Le champ Nom de la marque est obligatoire.',
        'name.string' => 'Le nom de la marque doit être une chaîne.',
        'name.max' => 'Le nom de la marque ne doit pas dépasser :max caractères.',
        'name.unique' => 'Le nom de la marque est déjà pris.'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Mark::paginate(20);
        return view('admin.mark.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mark.add');
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
            'name' => 'required|string|max:255|unique:mark',
        ],$this->errors);
        
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $brand = Mark::create([
            'name' => $request->name
        ]);

        if($brand){
            return back()->with('success', 'Marque créée avec succès !');
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
            $brand = Mark::findOrFail($id);
            return view('admin.mark.edit', compact('brand'));
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
            $brand = Mark::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:mark,name,' . $brand->id,
            ], $this->errors);

            $brand->update([
                'name' => $request->name
            ]);

            return back()->with('success', 'Marque mise à jour avec succès !');
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
            $brand = Mark::findOrFail($id);
            $brand->delete();
            return back()->with('success', 'Marque supprimée avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
