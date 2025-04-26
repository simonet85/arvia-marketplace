<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word();
        $slug = Str::slug($name);

        // Télécharger une image d'Unsplash pour la catégorie
        $unsplashUrl = "https://source.unsplash.com/600x400/?cosmetics,products," . uniqid();
        $imageContent = Http::get($unsplashUrl)->body();
        $filename = 'categories/' . $slug . '-' . uniqid() . '.jpg';
        Storage::disk('public')->put($filename, $imageContent);

        return [
            'name' => ucfirst($name),
            'slug' => $slug,
            'description' => $this->faker->sentence(10),
            'image' => $filename,
        ];
    }
}
