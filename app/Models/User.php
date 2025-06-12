<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\WishlistItem;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'email',
        'password',
        'profile_photo_url',
        'role_id',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_items')
            ->withPivot('quantity');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlist_items')
            ->withTimestamps();
    }
}
