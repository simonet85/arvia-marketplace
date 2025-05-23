<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $categories = Category::all();
    //     return view('categories.index', compact('categories'));
    // }

    public function index(Request $request)
    {
        $query = Category::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%$search%");
        }

        $perPage = $request->input('per_page', 5);

        return response()->json($query->latest()->paginate($perPage));
        //return Category::latest()->paginate(3); // par exemple 5 éléments par page
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categories = Category::orderBy('created_at', 'desc')->paginate(9);
        return view('categories.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($validated['name']);
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->save();

        return response()->json(['category' => $category, 'message' => 'Categorie ajoutée avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Show the category with its products associated related to it
        $products = $category->products()->paginate(6);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
        return view('categories.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Show the form for editing the category
        // with its image and redirect to categories.index
        $category = Category::findOrFail($category->id);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);
        $category = Category::findOrFail($id);
        $data = $validated;
        //Ne pas inclure l'image dans fill
        unset($data['image']);
        $category->fill($data);
        $category->slug = Str::slug($validated['name']);

        // $category->name = $request->name;
        // $category->slug = Str::slug($request->name);
        // $category->description = $request->description;
        
        if ($request->hasFile('image')) {
            if ($category->image) Storage::disk('public')->delete($category->image);
            $category->image = $request->file('image')->store('categories', 'public');
        }
    
        $category->save();
        // Refresh the category instance to get the updated values
        $category->refresh(); 
    
        return response()->json([
            'status' => 'success',
            'message' => 'Catégorie mise à jour avec succès',
            'data' => $category
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if (!$category) {
            return response()->json(['message' => 'Aucune Categorie trouvée'], 404);
        }
        // Delete the category and its image
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
    
        return response()->json(['message' => 'Categorie supprimée avec succès.']);
    }

    public function json(Request $request)
    {
        return Category::select('id', 'name')->get();
    }

}
