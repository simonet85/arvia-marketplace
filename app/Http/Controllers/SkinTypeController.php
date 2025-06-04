<?php

namespace App\Http\Controllers;

use App\Models\SkinType;
use Illuminate\Http\Request;

class SkinTypeController extends Controller
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
    public function show(SkinType $skinType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkinType $skinType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkinType $skinType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkinType $skinType)
    {
        //
    }
    /**
     * Get JSON data for skin types.
     */
    public function json()
    {
        $skinTypes = SkinType::all();
        return response()->json($skinTypes);   
    }
    /**
     * Get JSON data for skin types with ingredients.
     */
    public function jsonWithIngredients(){
        $skinTypes = SkinType::with('ingredients')->get();
        return response()->json(['skinTypes' => $skinTypes]);
    }
    /**
     * Get JSON data for skin types with ingredients and products.
     */
    public function jsonWithIngredientsAndProducts()
    {
        $skinTypes = SkinType::with(['ingredients', 'products'])->get();
        return response()->json(['skinTypes' => $skinTypes]);
    }
    /**
     * Fetch skin types with ingredients and products.
     */
    public function fetch()
    {
        $skinTypes = SkinType::with(['ingredients', 'products'])->get();
        return response()->json($skinTypes);
    }
    /**
     * Fetch skin types with products.
     */
    public function fetchWithProducts()
    {
        $skinTypes = SkinType::with('products')->get();
        return response()->json($skinTypes);
    }
}
