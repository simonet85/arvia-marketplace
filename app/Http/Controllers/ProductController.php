<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        return view('products.index', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index');
    }
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
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
        return view('products.create');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return view('products.index', compact('products'));
    }
    public function filter(Request $request)
    {
        $category = $request->input('category');
        $products = Product::where('category_id', $category)->get();

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
}
