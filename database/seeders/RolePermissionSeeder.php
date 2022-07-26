<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_permissions')->insert([
            'role_id' => Role::select('id')->first()->id,
            'permission_id' => Permission::select('id')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
