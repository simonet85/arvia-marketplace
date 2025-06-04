<?php

namespace App\Models;

use App\Models\SkinType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function skinTypes()
{
    return $this->belongsToMany(SkinType::class);
}

}
