<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    public function test_user_login()
    {
        $user = User::factory()->create(['password' => '123456']);

        $userData = [
            'email' => $user->email,
            'password' => '123456',
        ];

        $response = $this->postJson('/api/auth/login', $userData);

        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }
}
