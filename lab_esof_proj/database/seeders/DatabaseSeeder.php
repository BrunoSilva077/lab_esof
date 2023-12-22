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
        $products = Products::factory(20)->create();
        Images::factory(15)->create();
        Voucher::factory(10)->create();


        // Obtém todos os usuários administradores
        $admins = User::where('is_admin', true)->get();

        // Associa todos os produtos a todos os usuários administradores
        // foreach ($admins as $admin) {
        //     foreach ($products as $product) {
        //         $admin->products()->attach($product);
        //     }
        // }

        


        // Images::factory(20)->create()->each(function ($image, $index) use ($products) {
        //     // Obtém o índice do produto correspondente (cada produto terá 4 imagens associadas)
        //     $productIndex = $index % count($products);
        
        //     // Obtém o produto correspondente ao índice
        //     $product = $products[$productIndex];
        
        //     // Associa a imagem ao produto
        //     $image->products()->attach($product);
        // });
        // Favorito::factory(20)->create();
        // FavoritoProdutos::factory(20)->create();
    }
}
