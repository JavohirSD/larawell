<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_new_user()
    {
        $user = User::factory()->make()->toArray();

        $response = $this->call('POST', 'api/register', $user);

        $response->assertStatus(201)
            ->assertJson([
                "status" => true,
                "data"   => [
                    "user" => [
                        'name'     => $user["name"],
                        'username' => $user["username"],
                        'email'    => $user["email"],
                        'auth_key' => $user["auth_key"],
                    ]
                ]
            ]);
    }
}
