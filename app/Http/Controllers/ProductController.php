<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::paginate(9);
        $products = Product::orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->paginate(9);

        return view('products.index', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:products,slug',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'featured' => 'boolean',
            'bestseller' => 'boolean',
            'popular' => 'boolean',
            'skin_type' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // $imagePath = $request->file('image')->store('products', 'public');
        $imagePath = $request->hasFile('image') ? 
                     $request->file('image')->store('products', 'public') 
                     : null;

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'featured' => $request->boolean('featured'),
            'bestseller' => $request->boolean('bestseller'),
            'popular' => $request->boolean('popular'),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'skin_type' => $request->skin_type,
        ]);

        return response()->json(['message' => 'Produit enregistré', 'product' => $product]);
        // return redirect()->route('products.index');
    }
    public function update(Request $request,  $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'featured' => 'boolean',
            'bestseller' => 'boolean',
            'popular' => 'boolean',
            'skin_type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mettre à jour le produit
        $product = Product::findOrFail($id);

        // vérifier si l'image existe
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        
            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
        // Mettre à jour les autres champs
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'featured' => $request->boolean('featured'),
            'bestseller' => $request->boolean('bestseller'),
            'popular' => $request->boolean('popular'),
            'skin_type' => $request->skin_type,
        ]);

        $product->refresh(); 
        
        return response()->json(['message' => 'Produit mis à jour', 'product' => $product]);
    }
    public function destroy($id)
    {
        // Trouver le produit par son ID
        $product = Product::findOrFail($id);
        // Vérifier si le produit a une image et la supprimer
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return response()->json(['message' => 'Produit supprimé avec succès.']);
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function create()
    {
        // Récupérer toutes les catégories pour le formulaire de création de produit
        $categories = Category::all();
        // Récupérer tous les produits pour le formulaire de création de produit
        $products = Product::orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(9);
        // Passer les catégories à la vue
        return view('products.create', compact('categories', 'products'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('products.index', compact('products'));
    }
    public function filter(Request $request)
    {
        $category = $request->input('category');
        $products = Product::where('category_id', $category)
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->get();
    
        return view('products.index', compact('products'));
    }
    public function sort(Request $request)
    {
        $sortBy = $request->input('sort_by');
        $products = Product::orderBy($sortBy)->get();

        return view('products.index', compact('products'));
    }
    public function paginate(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $products = Product::paginate($perPage);

        return view('products.index', compact('products'));
    }

    public function json(Request $request)
    {
        // $products = Product::with('category')->paginate(3);
        // $query = Product::with('category');
        $query = Product::with('category')
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc');


        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        return response()->json($query->paginate(9));

        //return $query->paginate(3); // ou autre valeur par page
        // return response()->json($products);
    }
    public function fetch()
    {
        // $products = Product::all();
        $products = Product::orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->get();

        return response()->json($products);
    }
    // public function fetchByCategory($categoryId)
    // {
    //     $products = Product::where('category_id', $categoryId)->get();
    //     return response()->json($products);
    // }
    // public function fetchBySlug($slug)
    // {
    //     $product = Product::where('slug', $slug)->first();
    //     return response()->json($product);
    // }
}
