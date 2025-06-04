<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = auth()->user()->orders()->with('orderItems.product')->latest()->get();
        return view('orders.index', compact('orders'));
    }
    public function suivi()
    {
         $orders = auth()->user()->orders()->with('orderItems.product')->latest()->get();
        return view('suivi.index', compact('orders'));
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
    public function show(Order $order)
    {
        $this->authorize('view', $order); // Optional: policy for security
        $order->load('orderItems.product');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $this->authorize('update', $order); // Optional: policy for security
        $order->load('orderItems.product');
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order); // Optional: policy for security

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update($request->only('status'));

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order); // Optional: policy for security
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Commande supprimée.');
    }
}
