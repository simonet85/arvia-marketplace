<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $query = $user->orders()->with('orderItems.product');

        // Filtering by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filtering by priority
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Search by order number
        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%' . $request->search . '%');
        }

        $orders = $query->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }
    public function suivi()
    {
         $orders = auth()->user()->orders()->with('orderItems.product')->latest()->get();
        return view('suivi.index', compact('orders'));
    }

    public function cancel(Order $order)
    {
        if ($order->user_id !== auth()->id() || $order->status !== 'En attente') {
            abort(403);
        }
        $order->status = Order::STATUS_CANCELLED;
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Commande annulée.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Order::class); // Optional: policy for security
        return view('orders.create');
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
       // $this->authorize('view', $order); // Optional: policy for security
        $order->load('orderItems.product');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
       // $this->authorize('update', $order); // Optional: policy for security
        $order->load('orderItems.product');
        // dd($order);
        return view('orders.edit', [
            'order' => $order,
            'statuses' => Order::STATUS_LIST,
            'priorities' => Order::PRIORITY_LIST,
            'paymentStatuses' => Order::PAYMENT_STATUS_LIST,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
       // $this->authorize('update', $order); // Optional: policy for security
       
       $request->validate([
           'status' => 'required|in:'.implode(',', Order::STATUS_LIST),
           'priority' => 'nullable|in:'.implode(',', Order::PRIORITY_LIST),
           'payment_status' => 'nullable|in:'.implode(',', Order::PAYMENT_STATUS_LIST),
        ]);

        $order->update($request->only(['status', 'priority','payment_status']));

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
       // $this->authorize('delete', $order); // Optional: policy for security
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Commande supprimée.');
    }
}
