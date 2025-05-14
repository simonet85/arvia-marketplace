<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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
        // Liste de noms de cosmétiques pour générer des produits

        $cosmeticNames = [
            'Hydrating Face Cream',
            'Gentle Cleanser',
            'Oil Control Serum',
            'Nourishing Night Cream',
            'Vitamin C Serum',
            'Aloe Vera Gel',
            'Rose Water Toner',
            'Charcoal Detox Mask',
            'Anti-Aging Eye Cream',
            'SPF 50+ Sunscreen',
            'Green Tea Moisturizer',
            'Lip Repair Balm',
            'Hyaluronic Acid Booster',
            'Collagen Rejuvenating Serum',
            'Shea Butter Body Lotion',
        ];

        // Choisir un nom de cosmétique aléatoire
        $name = $this->faker->unique()->randomElement($cosmeticNames);
        // Générer un slug à partir du nom
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
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(), 
            'description' => $this->faker->paragraph(),
            'bestseller' => $this->faker->boolean(),
            'popular' => $this->faker->boolean(),
            'featured' => $this->faker->boolean(30), // Ajout ici
            'skin_type' => $this->faker->randomElement(['dry', 'oily', 'combination', 'sensitive']),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'stock' => $this->faker->numberBetween(10, 200),
            'image' => $filename,
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => now(),
        ];
        
        
    }
}
