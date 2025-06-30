<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->delete(); // Clear existing pages

        DB::table('pages')->insert([
            [
                'id' => \Str::uuid(),
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'body' => 'This is the Privacy Policy page content.',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => \Str::uuid(),
                'title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
                'body' => 'This is the Terms and Conditions page content.',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => \Str::uuid(),
                'title' => 'About Us',
                'slug' => 'about-us',
                'body' => 'This is the About Us page content.',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => \Str::uuid(),
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'body' => 'This is the Contact Us page content.',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
