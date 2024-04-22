<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Problem;
use App\Models\ProblemType;

class ProblemController extends Controller
{
    private $errors = [
        'name.required' => 'Le champ Nom est obligatoire.',
        'name.string' => 'Le nom doit être une chaîne.',
        'name.max' => 'Le nom ne doit pas dépasser :max caractères.',
        'name.unique' => 'Le nom est déjà pris.',
        'mark_id.required' => 'Le type de problème est obligatoire.',
        'icon.required' => 'L\'icône est obligatoire.',
        'icon.image' => 'L\'icône doit être un fichier image au format SVG.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = Problem::paginate(20);
        return view('admin.problem.list', compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProblemType::all();
        return view('admin.problem.add', compact('types'));
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
            'name' => 'required|string|max:255|unique:problem',
            'type_id' => 'required|integer',
            'icon' => 'required|image|mimes:svg',
        ],$this->errors);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $image = $request->file('icon');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images/cars',$imagename);

        $problem = Problem::create([
            'icon' => $imagename,
            'name' => $request->name,
            'type_id' => $request->type_id
        ]);

        if($problem){
            return back()->with('success', 'Problème créé avec succès !');
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
            $types = ProblemType::all();
            $problem = Problem::findOrFail($id);
            return view('admin.problem.edit', compact('types', 'problem'));
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
            $problem = Problem::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:problem,name,' . $problem->id,
                'type_id' => 'required|integer'
            ], $this->errors);

            if($request->icon != null){
                $image = $request->file('icon');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images/cars',$imagename);
                $img = 'images/cars/'.$imagename;
            }else{
                $img = $problem->icon;
            }

            $problem->update([
                'icon' => $img,
                'name' => $request->name,
                'type_id' => $request->type_id
            ]);

            return back()->with('success', 'Problème mis à jour avec succès !');
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
            $problem = Problem::findOrFail($id);
            $problem->delete();
            return back()->with('success', 'Problème supprimé avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
