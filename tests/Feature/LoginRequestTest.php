<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_user_with_credentials()
    {
        $response = $this->call('POST', 'api/login', [
            'username'      => 'firstname5',
            'password_hash' => '1234567',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data"   => [
                    "user" => [
                        "username" => "firstname5"
                    ]
                ]]);
    }


    public function test_login_user_without_credentials()
    {
        $response = $this->call('POST', 'api/login', [
            'username'      => "wrong_username" . time(),
            'password_hash' => "wrong_password" . time(),
        ]);

        $response->assertStatus(403)
            ->assertJson([
                "status" => false,
                "errors" => "Bad credentials"
            ]);
    }
}
