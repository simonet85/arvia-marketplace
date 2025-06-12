<?php

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller{
    public function index()
    {
        $wishlist = WishlistItem::where('user_id', Auth::id())
            ->with('product')
            ->get()
            ->pluck('product');
        return view('wishlist.index', compact('wishlist'));
    }

    public function toggle(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);
        $item = WishlistItem::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        if ($item) {
            $item->delete();
            // return response()->json(['status' => 'removed']);
        } else {
            WishlistItem::create(['user_id' => Auth::id(), 'product_id' => $request->product_id]);
            // return response()->json(['status' => 'added']);
        }
        return back()->with('status', 'la liste de souhaits modifiée!');
    }
}
