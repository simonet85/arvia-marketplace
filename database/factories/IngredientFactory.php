<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Aloe Vera', 'Huile de jojoba', 'Acide hyaluronique', 'Vitamine C', 'Beurre de karité', 'Huile d\'argan', 'Acide salicylique', 'Niacinamide', 'Collagène', 'Extrait de thé vert', 'Acide glycolique', 'Huile de coco', 'Extrait de camomille', 'Huile d\'avocat', 'Extrait de rose', 'Extrait de lavande', 'Extrait de calendula', 'Extrait de concombre', 'Extrait de grenade', 'Extrait de mûre',]),
            'description' => fake()->sentence(),
        ];
    }
}
