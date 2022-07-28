<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->state([
            'name' => 'PVK',
            'email' => 'root@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('123@123'),
            'type' => User::TYPES['admin'],
            'verified_at' => now(),
            'school_id' => null,
        ])->create();
        User::factory()->count(5)->create();
           
    }
}
