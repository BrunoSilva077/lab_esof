<?php


namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     */
    public function testClassConstructor(): void
    {
        $response = $this->post('register', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'password_confirmation' => $this->faker->password,
        ]);

        $user = User::all()->last();

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
    public function testClassConstructorWithWrongPasswordAndEmail(): void
    {
        $response = $this->post('register', [
            'name' => $this->faker->name,
            'email' => 'wrongemail',
            'password' => $this->faker->password,
            'password_confirmation' => $this->faker->password,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['password']);
        $response->assertSessionHasErrors(['email']);
    }

    public function testLoginWithWrongPassword() :void
    {
        $user = User::factory()->create();
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);
        $response->assertStatus(302);
    }

    public function testUserEditProfilePost(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user);

        $response = $this->post('/user/update/' . $user->id, [
            'email' => $this->faker->name,
        ]);

        $response->assertStatus(302);
    }

    public function testUserListUsers(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('adminclients');

        $response->assertStatus(200);
    }


    public function testUserListProducts(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('adminproducts');

        $response->assertStatus(200);
    }

    public function testUserListVouchers(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('adminvouchers');

        $response->assertStatus(200);
    }

    public function testUserListImages(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('adminimages');

        $response->assertStatus(200);
    }

    public function testUserEditVoucher(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('admin/editvoucher/1');

        $response->assertStatus(200);
    }
    
    public function testUserEditUser(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('admin/edituser/1');

        $response->assertStatus(200);
    }

    public function testUserCreateVoucher(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($user);

        $response = $this->get('admin/create');

        $response->assertStatus(200);
    }

}
