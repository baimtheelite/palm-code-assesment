<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete(); // Clear existing users

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super_admin@example.com',
        ]);
        
        $user->assignRole('super_admin');
        
        $user = User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@example.com',
        ]);

        $user->assignRole('writer');
    }
}
