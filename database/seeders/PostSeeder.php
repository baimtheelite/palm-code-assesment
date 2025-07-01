<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //post factory relationship with category many to many
        $posts = Post::factory()->count(10)->create();

        $posts->each(function ($post) {
            $post->categories()->attach(Category::inRandomOrder()->take(3)->pluck('id'));
        });
    }
}
