<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Products;
use App\Models\Images;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\ProductUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users=User::factory(10)->create();
        // Products::factory(5)->create();
        
        // Cria 5 produtos
        Brands::factory(5)->create();
        Categories::factory(5)->create();
        $products = Products::factory(5)->create();
        Images::factory(15)->create();

        $adminUsers = $users->filter(function ($user) {
            return $user->is_admin; // Filtra usuários que são admins
        });

        $adminUsers->each(function ($admin) use ($products) {
            ProductUser::factory(1)->create([
                'user_id' => $admin->id,
                'product_id' => $products->random()->id,
            ]);
        });

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
    }
}
