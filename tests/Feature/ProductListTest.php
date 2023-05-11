<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_products_list(): void
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $response = $this->getJson('/api/products', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['status', 'ok', 'data']);
    }
}
