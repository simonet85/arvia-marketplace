<?php

namespace Database\Seeders;

use App\Models\SkinType;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // If you want to create ingredients with specific names and descriptions, you can do so like this:
        $ingredients = [
            ['name' => 'Aloe Vera', 'description' => 'Hydratant et apaisant pour la peau.'],
            ['name' => 'Huile de jojoba', 'description' => 'Hydratante et régulatrice de sébum.'],
            ['name' => 'Acide hyaluronique', 'description' => 'Hydratant puissant pour la peau.'],
            ['name' => 'Vitamine C', 'description' => 'Antioxydant et éclaircissant pour la peau.'],
            ['name' => 'Beurre de karité', 'description' => 'Hydratant et nourrissant pour la peau.'],
            ['name' => 'Huile d\'argan', 'description' => 'Hydratante et nourrissante pour la peau.'],
            ['name' => 'Acide salicylique', 'description' => 'Exfoliant et anti-acné.'],
            ['name' => 'Niacinamide', 'description' => 'Anti-inflammatoire et régulateur de sébum.'],        
            ['name' => 'Collagène', 'description' => 'Régénérateur et raffermissant pour la peau.'],
            ['name' => 'Extrait de thé vert', 'description' => 'Antioxydant et apaisant pour la peau.'],
            ['name' => 'Acide glycolique', 'description' => 'Exfoliant et éclaircissant pour la peau.'],
            ['name' => 'Huile de coco', 'description' => 'Hydratante et nourrissante pour la peau.'],
            ['name' => 'Extrait de camomille', 'description' => 'Apaisant et anti-inflammatoire pour la peau.'],
            ['name' => 'Huile d\'avocat', 'description' => 'Hydratante et nourrissante pour la peau.'],
            ['name' => 'Extrait de rose', 'description' => 'Apaisant et hydratant pour la peau.'],
            ['name' => 'Extrait de lavande', 'description' => 'Apaisant et relaxant pour la peau.'],
            ['name' => 'Extrait de calendula', 'description' => 'Apaisant et anti-inflammatoire pour la peau.'],
            ['name' => 'Extrait de concombre', 'description' => 'Hydratant et rafraîchissant pour la peau.'],
            ['name' => 'Extrait de grenade', 'description' => 'Antioxydant et anti-âge pour la peau.'],
            ['name' => 'Extrait de mûre', 'description' => 'Antioxydant et hydratant pour la peau.'],
        ];
        
        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::create($ingredientData);
            $skinTypes = SkinType::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $ingredient->skinTypes()->sync($skinTypes);
        }
        // Alternatively, you can use the factory to create ingredients
        // Ingredient::factory()->count(10)->create()->each(function ($ingredient) {
        //     $skinTypes = SkinType::inRandomOrder()->take(rand(1, 3))->pluck('id');
        //     $ingredient->skinTypes()->sync($skinTypes);
        // });
        // If you want to create ingredients with specific names, you can do so like this:
        // $ingredients = [
        //     'Aloe Vera',
        //     'Huile de jojoba',
        //     'Acide hyaluronique',
        //     'Vitamine C',
        //     'Beurre de karité',
        //     'Huile d\'argan',
        //     'Acide salicylique',                         
        //     'Niacinamide',
        //     'Collagène',
        //     'Extrait de thé vert',
        //     'Acide glycolique',
        //     'Huile de coco',
        //     'Extrait de camomille',
        //     'Huile d\'avocat',
        //     'Extrait de rose',       
        //     'Extrait de lavande',
        //     'Extrait de calendula',
        //     'Extrait de concombre',
        //     'Extrait de grenade',
        //     'Extrait de mûre',
        // ];
        // foreach ($ingredients as $name) {
        //     Ingredient::create([
        //         'name' => $name,
        //         'description' => fake()->sentence(),
        //     ]);
        // }
        // If you want to create ingredients with specific names and descriptions, you can do so like this:
        // $ingredients = [
        //     ['name' => 'Aloe Vera', 'description' => 'Hydratant et apaisant pour la peau.'],
        //     ['name' => 'Huile de jojoba', 'description' => 'Hydratante et régulatrice de sébum.'],
        //     ['name' => 'Acide hyaluronique', 'description' => 'Hydratant puissant pour la peau.'],
        //     ['name' => 'Vitamine C', 'description' => 'Antioxydant et éclaircissant pour la peau.'],
        //     ['name' => 'Beurre de karité', 'description' => 'Hydratant et nourrissant pour la peau.'],
        //     ['name' => 'Huile d\'argan', 'description' => 'Hydratante et nourrissante pour la peau.'],
        //     ['name' => 'Acide salicylique', 'description' => 'Exfoliant et anti-acné.'],
        //     ['name' => 'Niacinamide', 'description' => 'Anti-inflammatoire et régulateur de sébum.'],        
        //     ['name' => 'Collagène', 'description' => 'Régénérateur et raffermissant pour la peau.'],
        //     ['name' => 'Extrait de thé vert', 'description' => 'Antioxydant et apaisant pour la peau.'],
        //     ['name' => 'Acide glycolique', 'description' => 'Exfoliant et éclaircissant pour la peau.'],
        //     ['name' => 'Huile de coco', 'description' => 'Hydratante et nourrissante pour la peau.'],
        //     ['name' => 'Extrait de camomille', 'description' => 'Apaisant et anti-inflammatoire pour la peau.'],
        //     ['name' => 'Huile d\'avocat', 'description' => 'Hydratante et nourrissante pour la peau.'],
        //     ['name' => 'Extrait de rose', 'description' => 'Apaisant et hydratant pour la peau.'],
        //     ['name' => 'Extrait de lavande', 'description' => 'Apaisant et relaxant pour la peau.'],
        //     ['name' => 'Extrait de calendula', 'description' => 'Apaisant et anti-inflammatoire pour la peau.'],
        //     ['name' => 'Extrait de concombre', 'description' => 'Hydratant et rafraîchissant pour la peau.'],
        //     ['name' => 'Extrait de grenade', 'description' => 'Antioxydant et anti-âge pour la peau.'],
        //     ['name' => 'Extrait de mûre', 'description' => 'Antioxydant et hydratant pour la peau.'],
        // ];
        // foreach ($ingredients as $ingredientData) {
        //     Ingredient::create($ingredientData);
        // }
 
    }
}
