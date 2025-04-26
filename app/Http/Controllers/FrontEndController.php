<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('welcome');
    }
   
    public function products(Request $request)
    {
        $products = Product::paginate(9);
        return view('products.index', compact('products'));
    }
   
    public function about()
    {
        return view('about');
    }
   
    public function categories()
    {
        return view('categories');
    }
   
}
