<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'code' => fake()->unique()->word(),
            'address' => fake()->unique()->sentence(),
            'type' => fake()->randomNumber(5, false),
            'phone' => fake()->phoneNumber(),
            'hotline' => fake()->phoneNumber(),
            'province_code' => fake()->randomNumber(4, true),
            'institution_code' => fake()->randomNumber(4, true),
            'main_branch' => fake()->randomDigit(),
            'zip_code' => fake()->randomNumber(6, true),
            'attribute_information_setting_date' => now(),
            'old_school_investigation_number' => fake()->phoneNumber(),
            'facebook_url' => null,
            'twitter_url' => null,
            'youtube_url' => null,
            'fax_number' => null,
        ];
    }
}
