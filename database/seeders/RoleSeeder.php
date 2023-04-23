<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Admin']);
        $Role2 = Role::create(['name'=>'Client']);

        Permission::create(['name' => 'dashboard.dashboard'])->syncRoles([$role1]);
        // Permission::create(['name' => 'dashboard']);
        // Permission::create(['name' => 'dashboard']);
        // Permission::create(['name' => 'dashboard']);
    }
}
