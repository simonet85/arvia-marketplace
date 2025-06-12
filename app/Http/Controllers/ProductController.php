<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Ingredient;
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:products,slug',
            'category_id' => 'required|integer|exists:categories,id', // Assuming categories is a table with id
            'description' => 'required|string',
            'skin_type_ids' => 'array',
            'skin_type_ids.*' => 'exists:skin_types,id', // Assuming skin_types is a table with id
            'ingredient_ids' => 'array',
            'ingredient_ids.*' => 'exists:ingredients,id', // Assuming ingredients is a table with id
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'featured' => 'boolean|sometimes',
            'bestseller' => 'boolean|sometimes',
            'popular' => 'boolean|sometimes',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $imagePath = $request->file('image')->store('products', 'public');
        $imagePath = $request->hasFile('image') ? 
                     $request->file('image')->store('products', 'public') 
                     : null;

        $product = Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'featured' => $validated['featured'] ?? false,
            'bestseller' => $validated['bestseller'] ?? false,
            'popular' => $validated['popular'] ?? false,
            // 'skin_type_' => $validated['skin_type'],
            'image' => $imagePath,
        ]);

        // Attacher les types de peau et les ingrédients au produit
        $product->skinTypes()->sync($validated['skin_type_ids'] ?? []);
        $product->ingredients()->sync($validated['ingredient_ids'] ?? []);
        
        // Retourner une réponse JSON ou rediriger vers une autre page
        return response()->json([
            'message' => 'Produit enregistré',
            'product' => $product->load('skinTypes', 'ingredients', 'category')
        ]);
    }
    public function update(Request $request,  $id)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'featured' => 'boolean',
            'bestseller' => 'boolean',
            'popular' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skin_type_ids' => 'array',
            'skin_type_ids.*' => 'exists:skin_types,id', // Assuming skin_types is a table with id
            'ingredient_ids' => 'array',
            'ingredient_ids.*' => 'exists:ingredients,id', // Assuming ingredients is a table with id
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
            $product->image = $request->file('image')->store('products', 'public');
        }
        // Mettre à jour les autres champs
        $product->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'featured' => $validated['featured'] ?? false,
            'bestseller' => $validated['bestseller'] ?? false,
            'popular' => $validated['popular'] ?? false,
            'image' => $product->image, // Utiliser l'image mise à jour ou l'ancienne
        ]);

        // Attacher les types de peau et les ingrédients au produit
        $product->skinTypes()->sync($validated['skin_type_ids'] ?? []);
        $product->ingredients()->sync($validated['ingredient_ids'] ?? []);

        // Rafraîchir le produit pour obtenir les données mises à jour
        $product->refresh(); 
        
        return response()->json([
            'message' => 'Produit mis à jour',
            'product' => $product->load('skinTypes', 'ingredients', 'category')
        ]);
    }
    public function destroy($id)
    {
        // Trouver le produit par son ID
        $product = Product::findOrFail($id);
        // Vérifier si le produit a une image et la supprimer
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        //Supprimer les relations many-to-many entre le produit et les types de peau et les ingrédients
        $product->skinTypes()->detach();
        $product->ingredients()->detach();
        // Supprimer le produit
        $product->delete();
        return response()->json(['message' => 'Produit supprimé avec succès.']);
    }
    public function show($slug)
    {
        // Trouver le produit par son slug
        $product = Product::where('slug', $slug)->firstOrFail();
        // -- Get similar products based on category --
        $category = $product->category;
        // Récupérer les ingrédients associés au produit limité à 3
        $ingredients = $product->ingredients()->take(3)->get();
        // Récupérer les types de peau associés au produit limité à 5
        $skinTypes = $product->skinTypes()->take(5)->get();
        // Récupérer les produits similaires dans la même catégorie, en excluant le produit actuel
        // Limiter à 4 produits similaires
        $similarProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        return view('products.show', compact('product', 'similarProducts', 'ingredients', 'skinTypes'));
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
        // Récupérer tous les ingrédients pour le formulaire de création de produit
        $ingredients = Ingredient::with('skinTypes')->get();
    
        // Passer les catégories, les produits et les ingrédients à la vue
        return view('products.create', compact('categories', 'products', 'ingredients'));
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
        $perPage = 10;

        $query = Product::with(['category', 'skinTypes', 'ingredients'])
        ->orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if($request->filled('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }

        // sort by price
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'featured':
                    // Filtre uniquement les produits en vedette
                    $query->where('featured', true);
                    break;
                    // Filtrer les produits en vedette et trier par ordre décroissant
                    //$query->orderByDesc('featured');
                    //break;
                default:
                    // Optionnel : un tri par défaut
                    $query->orderBy('created_at', 'desc');
            }
        }
        // Filtrer par type de peau
        if ($request->filled('skin_type')) {
            $query->whereHas('skinTypes', function ($skinTypeQuery) use ($request) {
            $skinTypeQuery->where('skin_types.id', $request->input('skin_type'));
            });
        }

        $products = $query->paginate($perPage);

        // Ajouter les accessors à chaque produit de la collection
        // $products->getCollection()->transform(function ($product) {
        //     $product->in_stock = $product->in_stock;
        //     $product->formatted_price = $product->formatted_price;
        //     $product->average_rating = $product->average_rating;
        // });

        return response()->json($products);
    }
    public function fetch()
    {
        // $products = Product::all();
        $products = Product::orderBy('created_at', 'desc')
        ->orderBy('updated_at', 'desc')
        ->get();

        return response()->json($products);
    }

}
