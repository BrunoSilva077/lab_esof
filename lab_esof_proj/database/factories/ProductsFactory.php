<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;
use App\Models\Images;
use App\Models\Categories;
use App\Models\Brands;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->text(),
            'stock' => $this->faker->randomNumber(),
            'active' => $this->faker->boolean(),
            'categories_id' => Categories::all()->random()->id,
            'brand_id' => Brands::all()->random()->id
        ];

        
    }

    //     /**
    //  * Configure the model factory.
    //  *
    //  * @return $this
    //  */
    // public function configure(): self
    // {
    //     return $this->afterCreating(function (Products $product) {
    //         // Associar imagens aos produtos
    //         $images = Images::factory(3)->create();
    //         $product->images()->attach($images);
    //     });
    // }
}
