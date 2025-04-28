<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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

        $name = $this->faker->unique()->randomElement($cosmeticNames);
        // $name = $this->faker->unique()->word();
        $slug = Str::slug($name);

        // Chemin de sauvegarde de l'image
        $filename = 'categories/' . $slug . '-' . uniqid() . '.jpg';
        $path = storage_path('app/public/' . $filename);
        // Télécharger l'image d'Unsplash directement en tant que ficher binaire
        Http::sink($path)->get("https://source.unsplash.com/600x400/?cosmetics,products," . uniqid());


        // $imageContent = Http::get($unsplashUrl)->body();
        // $filename = 'categories/' . $slug . '-' . uniqid() . '.jpg';
        // Storage::disk('public')->put($filename, $imageContent);

        return [
            'name' => ucfirst($name),
            'slug' => $slug,
            'description' => $this->faker->sentence(10),
            'image' => $filename,
        ];
    }
}
