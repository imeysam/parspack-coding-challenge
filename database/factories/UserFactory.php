<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => fake()->password(),
            // 'password' => Hash::make(fake()->password()),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    // public function name($value): Factory
    // {
    //     // dd($attributes);
    //     return $this->state(fn (array $attributes) => [
    //         'name' => $value,
    //     ]);
    // }

    // public function password($value): Factory
    // {
    //     // dd($attributes);
    //     return $this->state(fn (array $attributes) => [
    //         'password' => $value,
    //     ]);
    // }
}
