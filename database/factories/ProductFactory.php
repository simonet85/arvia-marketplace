<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
        $name = $this->faker->words(3, true);
        $slug = Str::slug($name);

        // Générer une image Unsplash
        $unsplashUrl = "https://source.unsplash.com/600x600/?skincare,product," . $slug;

        // Télécharger l'image
        $imageContent = Http::get($unsplashUrl)->body();

        // Définir un nom de fichier unique
        $filename = 'products/' . $slug . '-' . uniqid() . '.jpg';

        // Sauvegarder l'image dans storage/app/public/products/
        Storage::disk('public')->put($filename, $imageContent);

        return [
            'name' => ucfirst($name),
            'slug' => $slug,
            'category_id' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph(),
            'bestseller' => $this->faker->boolean(),
            'popular' => $this->faker->boolean(),
            'skin_type' => $this->faker->randomElement(['dry', 'oily', 'combination', 'sensitive']),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'stock' => $this->faker->numberBetween(10, 200),
            'image' => $filename, // On enregistre seulement le chemin relatif
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => now(),
        ];
        
    }
}
