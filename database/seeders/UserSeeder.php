<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $userRole = Role::where('name', 'livreur')->first();
    
        // 10 utilisateurs "normaux"
        User::factory()->count(10)->create([
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    
        // 1 utilisateur personnalisé
        User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'profile_photo_url' => fake()->imageUrl(640, 480, 'people', true, 'profile'),
            'role' => 'user',
        ]);
    
        // 1 admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'profile_photo_url' => fake()->imageUrl(640, 480, 'people', true, 'admin'),
            'role' => 'admin',
        ]);

        // 1 livreur
        User::factory()->create([
            'name' => 'Livreur',
            'email' => 'livreur@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('livreur123'),
            'remember_token' => Str::random(10),
            'profile_photo_url' => fake()->imageUrl(640, 480, 'people', true, 'livreur'),
            'role' => 'livreur',
        ]);
    }
}
