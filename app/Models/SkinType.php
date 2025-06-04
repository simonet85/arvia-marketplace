<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkinType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }


}
