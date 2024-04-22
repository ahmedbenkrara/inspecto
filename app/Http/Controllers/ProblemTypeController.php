<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProblemType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProblemTypeController extends Controller
{
    private $errors = [
        'name.required' => 'Le champ nom est obligatoire.',
        'name.string' => 'Le nom doit être une chaîne.',
        'name.max' => 'Le nom ne doit pas dépasser :max caractères.',
        'name.unique' => 'Le nom est déjà pris.'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemtype = ProblemType::paginate(20);
        return view('admin.problemtype.list', compact('problemtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.problemtype.add');
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
            'name' => 'required|string|max:255|unique:problemtype',
        ],$this->errors);
        
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $type = ProblemType::create([
            'name' => $request->name
        ]);
        
        if($type){
            return back()->with('success', 'Type créé avec succès !');
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
            $type = ProblemType::findOrFail($id);
            return view('admin.problemtype.edit', compact('type'));
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
            $type = ProblemType::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:problemtype,name,' . $type->id,
            ], $this->errors);

            $type->update([
                'name' => $request->name
            ]);

            return back()->with('success', 'Type créé avec succès !');
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
            $type = ProblemType::findOrFail($id);
            $type->delete();
            return back()->with('success', 'Type supprimé avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
