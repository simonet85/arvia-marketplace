<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Statistiques globales
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'En attente')->count();
        $completedOrders = Order::where('status', 'Effectuée')->count();
        $cancelledOrders = Order::where('status', 'Annulée')->count();

        // 5 dernières commandes
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();
        // dd($recentOrders);
        return view('dashboard.index', compact(
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'cancelledOrders',
            'recentOrders'
        ));
    }
}
