<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_roles')->insert([
            'user_id' => User::select('id')->first()->id,
            'role_id' => Role::select('id')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
