<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Products;
use App\Models\Images;
use App\Models\Favorito;
use App\Models\FavoritoProdutos;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Products::factory(20)->create();
        Images::factory(15)->create();
        // Favorito::factory(20)->create();
        // FavoritoProdutos::factory(20)->create();
    }
}
