<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

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
        ];

        
    }
}
