<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkout.index');
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
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'shipping_address' => 'required|string|max:255',
            "delivery_notes" => 'nullable|string|max:500',
            'payment_method' => 'required|string',
        ]);

        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $shipping = $subtotal > 75 ? 0 : 10;
        $tax = round($subtotal * 0.08, 2);
        $total = $subtotal + $shipping + $tax;


        $order = Order::create([
            'user_id' => $user->id,
            'shipping_address' => $request->shipping_address,
            'delivery_notes' => $request->delivery_notes,
            'status' => 'En attente',
            'priority' => $request->priority ?? 'Basse',
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'payment_status' => 'Non payé',
            'order_number' => 'ORD' . strtoupper(uniqid()),
            'order_notes' => $request->order_notes,
            'coupon_code' => $request->coupon_code,
            'discount_amount' => $request->discount_amount ?? 0,
            'tax_amount' => $tax,
            'shipping_cost' => $shipping,
            'refund_status' => 'Non remboursé',
            'refund_amount' => $request->refund_amount ?? 0,
            'refund_reason' => $request->refund_reason ?? null,

            // 'name' => $request->name,
            // 'email' => $request->email,
            // 'phone' => $request->phone,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
                'status'     => 'En attente',
            ]);
        }

        // Clear the cart
        $user->cartItems()->delete();

        return redirect()->route('orders.index')->with('success', 'Commande passée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
