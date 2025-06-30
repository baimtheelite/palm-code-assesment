<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete(); // Clear existing categories

        DB::table('categories')->insert([
            [
                'id' => \Str::uuid(),
                'name' => 'Technology',
                'slug' => 'technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => \Str::uuid(),
                'name' => 'Health',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => \Str::uuid(),
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
