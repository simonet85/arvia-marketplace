<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     * home
     * products
     * about
     * categories
     */
    public function home()
    {
        // $featuredProducts = Product::where('featured', true)->take(4)->get();
        // Get only the first 4  products
        $featuredProducts = Product::take(4)->get();

        //Get only the first 4 categories
        $categories = Category::take(4)->get();

        // In a controller or middleware
        $userId = auth()->id();
        $sessionId = session()->getId();
        \Log::info("User session log", ['user_id' => $userId, 'session_id' => $sessionId]);


        return view('welcome', compact('featuredProducts', 'categories'));
    }
   
    public function products(Request $request)
    {
        $products = Product::paginate(6);
        return view('products.index', [
            'products' => $products, 'totalPages' => $products->lastPage()
        ]);

       
    }
   
    public function about()
    {
        return view('about');
    }
   
    public function categories()
    {
        $categories = Category::paginate(8);
        return view('categories.index', compact('categories'));
    }

    public function fetch(Request $request)
    {
        $sort = $request->input('sort');
        $page = $request->input('page', 1);
        $categories = explode(',', $request->input('categories', ''));
        $price = $request->input('price');
        $skinType = $request->input('skin_type');
        $bestseller = $request->input('bestseller');
        $populars = $request->input('popular');
        $newest = $request->input('newest');
        $search = $request->input('search');
    
        $query = Product::query();
    
        // 🔥 Flexible Search
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
    
        if (!empty($categories[0])) {
            $query->whereIn('category', $categories);
        }
    
        if ($price) {
            $query->where('price', '<=', $price);
        }
    
        if ($skinType) {
            $query->where('skin_type', $skinType);
        }
    
        if ($bestseller) {
            $query->where('bestseller', true);
        }
    
        if ($populars) {
            $query->where('popular', true);
        }
    
        if ($newest) {
            $query->where('newest', true);
        }
    
        // Sorting
        if ($sort === 'price-asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price-desc') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'newest') {
            $query->latest();
        } elseif ($sort === 'popular') {
            $query->orderBy('popularity', 'desc');
        }
    
        $products = $query->paginate(9, ['*'], 'page', $page);
    
        return view('partials.product-grid', compact('products'))->render();
    }
    
    public function cart(){
        return view('cart.index');
    }
    
    
   
}
