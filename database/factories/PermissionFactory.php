<?php

namespace Database\Factories;

use App\Models\PermissionGroup;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->word(),
            'key' => fake()->unique()->word(),
            'permission_group_id' =>PermissionGroup::all()->random()->id

        ];
    }
}
