<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Products;
use App\Models\Images;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Voucher;
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
        // Products::factory(5)->create();
        
        // Cria 5 produtos
        Brands::factory(5)->create();
        Categories::factory(5)->create();
        Products::factory(5)->create();
        Images::factory(15)->create();
        Voucher::factory(10)->create();


        // Obtém todos os usuários administradores
        $admins = User::where('is_admin', true)->get();
    }
}
