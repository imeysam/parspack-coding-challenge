<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentStoreTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * Test store comments endpoint.
     *
     * @return void
     */
    public function test_comment_store()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $commentData = [
            "product_name" => "A",
            "context" => $this->faker->sentence()
        ];

        $response = $this->postJson('/api/comments', $commentData, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(201);
    }
}
