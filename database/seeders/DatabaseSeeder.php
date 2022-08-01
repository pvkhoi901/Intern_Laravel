<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SchoolSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionGroupSeeder::class,
            PermissionSeeder::class,
            UserRoleSeeder::class,
            RolePermissionSeeder::class,

    ]);
    }
}
