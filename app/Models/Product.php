<?php

namespace App\Models;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\SkinType;
use App\Models\OrderItem;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'price',
        'stock',
        'skin_type',
        'bestseller',
        'popular',
        'image',
        'featured'
    ];

    protected $casts = [
        'bestseller' => 'boolean',
        'popular' => 'boolean',
        'featured' => 'boolean',
    ];

    protected $appends = ['image_url',
        'in_stock',
        'formatted_price',
        'average_rating'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function skinTypes()
    {
        return $this->belongsToMany(SkinType::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity', 'price', 'status');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
    public function getInStockAttribute()
    {
        return $this->stock > 0;
    }
    public function getAverageRatingAttribute(){
        $avg = $this->reviews()->avg('rating');
        return $avg ? round($avg, 1) : ($this->rating ?? 4.5);
    }
}
