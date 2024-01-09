<?php


namespace Tests\Feature;

use App\Models\User;
use App\Models\Products;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     */
    public function test_get_all_products()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }
    public function test_create_product(){

        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user)->post('products', [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'stock' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ]);

        $products = Products::all()->last();

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['id' => $products->id]);
    }

    public function test_soft_delete_product()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $product = Products::all()->random();
        
        $response = $this->actingAs($user)->post('/products/delete/' . $product->id );
        
        $response->assertStatus(302);
    }

    public function test_edit_product(){

        $user = User::factory()->create(['is_admin' => true]);
        $product = Products::all()->random();

        $response = $this->actingAs($user)->post('/products/' . $product->id, [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'stock' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ]);

        $response->assertStatus(302);
    }

    
}
