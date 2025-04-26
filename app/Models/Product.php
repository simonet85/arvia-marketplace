<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'price',
        'stock',
        'skin_type',
        'bestseller',
        'popular',
        'image',
    ];
    protected $casts = [
        'bestseller' => 'boolean',
        'popular' => 'boolean',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
