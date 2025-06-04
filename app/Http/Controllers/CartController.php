<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = (CartItem::with('product')
            ->where(function ($q) {
            $q->when(Auth::check(), fn($q) => $q->where('user_id', Auth::id()))
              ->when(!Auth::check(), fn($q) => $q->where('session_id', session()->getId()));
            })
            ->orderBy('id', 'desc')
            ->get()
        );
        // $cartItems = CartItem::with('product')->get();
        // get products with their category 
        $cartItems->each(function ($item) {
            $item->product->category = $item->product->category; // Assuming category is a relationship in Product model
        });

        return response()->json($cartItems);
    }



    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(['product_id' => 'required|exists:products,id']);

        $cartItem = CartItem::firstOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'session_id' => Auth::check() ? session()->getId() : null,
            ],
            ['quantity' => 0]
        );

        // dd($cartItem);
        // If the item already exists, increment the quantity
        if ($cartItem->exists) {
            $cartItem->increment('quantity');
        }
        // retourner à la page cart
        return redirect()->route('cart')->with('success', 'Produit ajouté au panier.');

        // return response()->json(['success' => true]);
    }


    public function remove(CartItem $item)
    {
        // Optionally, check if the item belongs to the current user/session
        if (Auth::check()) {
            if ($item->user_id !== Auth::id()) {
                abort(403);
            }
        } else {
            if ($item->session_id !== session()->getId()) {
                abort(403);
            }
        }

        $item->delete();

        return response()->json(['success' => true]);
    }

    public function clear()
    {
        CartItem::where('user_id', Auth::id())
            ->orWhere('session_id', session()->getId())
            ->delete();

        return back()->with('success', 'Panier vidé.');
    }

    public function checkout()
    {
        $cartItems = CartItem::with('product')
            ->where(function ($q) {
                $q->when(Auth::check(), fn($q) => $q->where('user_id', Auth::id()))
                  ->when(!Auth::check(), fn($q) => $q->where('session_id', session()->getId()));
            })
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Votre panier est vide.');
        }

        // Simulation de commande (à adapter à Order + Stripe plus tard)
        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // Vider le panier
        CartItem::whereIn('id', $cartItems->pluck('id'))->delete();
        return view('cart.success', ['total' => $total]);
    }
    public function update(Request $request, $id)
    {
        $delta = $request->input('quantity'); // can be positive or negative
        $cartItem = CartItem::where('id', $id)
            ->where(function ($q) {
                $q->when(Auth::check(), fn($q) => $q->where('user_id', Auth::id()))
                ->when(!Auth::check(), fn($q) => $q->where('session_id', session()->getId()));
            })
            ->first();

        if (!$cartItem) {
            return response()->json(['error' => 'Panier vide.'], 404);
        }

        $cartItem->quantity += $delta;
        if ($cartItem->quantity < 1) {
            $cartItem->quantity = 1;
        }
        $cartItem->save();

        // Return the updated item with product relation
        $cartItem->load('product');

        return response()->json($cartItem);
    }
}
