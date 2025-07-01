<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete(); // Clear existing roles

        DB::table('roles')->insert([
            [
                // 'id' => \Str::uuid(),
                'name' => 'super_admin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'id' => \Str::uuid(),
                'name' => 'writer',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
