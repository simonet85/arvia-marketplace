<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // --- Constantes pour status ---
    const STATUS_PENDING = 'En attente';
    const STATUS_COMPLETED = 'Effectuée';
    const STATUS_CANCELLED = 'Annulée';

    // --- Constantes pour priority ---
    const PRIORITY_LOW = 'Basse';
    const PRIORITY_MEDIUM = 'Normale';
    const PRIORITY_HIGH = 'Haute';
    // --- Constantes pour payment status ---
    const PAYMENT_STATUS_PAID = 'Payé';
    const PAYMENT_STATUS_UNPAID = 'Non payé';
    const PAYMENT_STATUS_REFUNDED = 'Remboursé';

    // --- Listes globales (utiles en validation, dropdown, etc) ---

    const STATUS_LIST = [
        self::STATUS_PENDING,
        self::STATUS_COMPLETED,
        self::STATUS_CANCELLED,
    ];
    const PRIORITY_LIST = [
        self::PRIORITY_LOW,
        self::PRIORITY_MEDIUM,
        self::PRIORITY_HIGH,
    ];
    const PAYMENT_STATUS_LIST = [
        self::PAYMENT_STATUS_PAID,
        self::PAYMENT_STATUS_UNPAID,
        self::PAYMENT_STATUS_REFUNDED,
    ];

    protected $fillable = [
        'user_id',
        'session_id',
        'status',
        'total_amount',
        'shipping_address',
        'billing_address',
        'payment_method',
        'payment_status',
        'priority',
        'tracking_number',
        'coupon_code',
        'discount_amount',
        'tax_amount',
        'shipping_cost',
        'refund_status',
        'refund_amount',
        'refund_reason',
        'order_notes',
        'order_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'price', 'status');
    }
}
