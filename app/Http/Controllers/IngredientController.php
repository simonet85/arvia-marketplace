<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }

    /**
     * Get JSON data for ingredients.
     */
    public function json()
    {
        $ingredients = Ingredient::with('skinTypes')->get();
        
        return response()->json(['ingredients' => $ingredients]);
    }
    /**
     * Get JSON data for ingredients with skin types.
     */
    public function fetch()
    {
        $ingredients = Ingredient::with('skinTypes')->get();
        return response()->json($ingredients);
    }
    /**
     * Search ingredients by name.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $ingredients = Ingredient::where('name', 'like', '%' . $query . '%')
            ->with('skinTypes')
            ->get();

        return response()->json($ingredients);
    }
}
