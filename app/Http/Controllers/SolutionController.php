<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Problem;
use App\Models\Solution;

class SolutionController extends Controller
{
    private $errors = [
        'problem_id.required' => 'Le champ Problème est obligatoire.',
        'problem_id.unique' => 'Ce problème a déjà une solution.',
        'description.required' => 'Le champ de description est obligatoire.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = Solution::paginate(20);
        return view('admin.solution.list', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $problems = Problem::all();
        return view('admin.solution.add', compact('problems'));
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
            'description' => 'required',
            'problem_id' => 'required|unique:solution,problem_id',
        ],$this->errors);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $solution = Solution::create([
            'description' => $request->description,
            'problem_id' => $request->problem_id
        ]);

        if($solution){
            return back()->with('success', 'Solution créée avec succès !');
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
            $problems = Problem::all();
            $solution = Solution::findOrFail($id);
            return view('admin.solution.edit', compact('problems', 'solution'));
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
            $solution = Solution::findOrFail($id);
            $request->validate([
                'description' => 'required',
                'problem_id' => 'required|unique:solution,problem_id,' . $solution->id,
            ], $this->errors);

            $solution->update([
                'description' => $request->description,
                'problem_id' => $request->problem_id
            ]);

            return back()->with('success', 'Solution mise à jour avec succès !');
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
            $solution = Solution::findOrFail($id);
            $solution->delete();
            return back()->with('success', 'Solution supprimée avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
