<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'jose',
            'email' => 'jose@hotmail.com',
            'password' => bcrypt('jose')

        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
