<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\PriceRange;

class PriceRangeController extends Controller
{
    private $errors = [
        'name.required' => 'Le titre du prix est requis.',
        'name.string' => 'Le titre du prix doit être une chaîne.',
        'name.max' => 'Le titre du prix ne doit pas dépasser :max caractères.',
        'name.unique' => 'Il y a déjà un prix avec le même titre.',

        'min.required' => 'La valeur minimale est requise.',
        'min.integer' => 'La valeur minimale doit être numérique.',
        'min.lte' => 'La valeur minimale doit être inférieure ou égale à :max.',
        
        'max.required' => 'La valeur maximale est requise.',
        'max.integer' => 'La valeur maximale doit être numérique.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = PriceRange::orderBy('min', 'asc')->paginate(20);
        return view('admin.pricerange.list', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricerange.add');
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
            'name' => 'required|string|max:255|unique:pricerange',
            'min' => 'required|integer|lte:max',
            'max' => 'required|integer',
        ],$this->errors);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $price = PriceRange::create([
            'name' => $request->name,
            'min' => $request->min,
            'max' => $request->max
        ]);

        if($price){
            return back()->with('success', 'Le prix est créé avec succès !');
        }
        return back()->with('error', 'Quelque chose c\'est mal passé. Merci d\'essayer plus tard.');
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
            $price = PriceRange::findOrFail($id);
            return view('admin.pricerange.edit', compact('price'));
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
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:pricerange,name,' . $id,
                'min' => 'required|integer|lte:max',
                'max' => 'required|integer',
            ], $this->errors);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $price = PriceRange::findOrFail($id);
            
            $result = $price->update([
                'name' => $request->name,
                'min' => $request->min,
                'max' => $request->max
            ]);

            if($result){
                return back()->with('success', 'Prix mis à jour avec succès !');
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
            $price = PriceRange::findOrFail($id);
            $price->delete();
            return back()->with('success', 'Prix supprimé avec succès !');
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
}
