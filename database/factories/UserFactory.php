<?php

namespace Database\Factories;
use App\Models\School;


use Illuminate\Database\Eloquent\Factories\Factory;
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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'username' => fake()->username(),
            'password' => fake()->password(),
            'address' => fake()->sentence(),
            'school_id' => School::first()->id,
            'type' => fake()->randomDigit(),
            'parent_id' => fake()->randomNumber(4, false),
            'verified_at' => now(),
            // 'closed' => false,
            'code' => fake()->unique()->randomNumber(5, false),
            'social_type' => fake()->randomDigit(),
            // 'social_id' => fake()->unique(),
            'social_name' => fake()->name(),
            'social_nickname' => fake()->word(),
            'social_avatar' => fake()->word(),
            'description' => fake()->sentence(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
