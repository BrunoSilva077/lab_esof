<?php


namespace Tests\Feature;

use App\Models\User;
use App\Models\Products;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoritoTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     */

    public function testClassConstructor(): void
    {
        $user = User::factory()->create();
        $product = Products::all()->random();

        $response = $this->actingAs($user)->get('/adicionar_favorito/'. $product->id, [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('favoritos', ['user_id' => $user->id]);
    }



}
