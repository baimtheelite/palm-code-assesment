<?php

namespace App\Repositories;

use App\Helpers\ResponseFormatter;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository
{
    public function baseQuery()
    {
        return Post::query()->with('images', 'categories')->where('status', 'published');
    }
    
    public function index(Request $request)
    {
        $show = $request->query('show', 15);

        $posts = $this->baseQuery()
                    ->orderBy('published_at', 'desc')
                    ->paginate($show);

        return $posts;
    }

    public function show(string $id)
    {
        $post = $this->baseQuery()->where('id', $id)->orWhere('slug', $id)->first();

        if (!$post) {
            return ResponseFormatter::error(null, 'Post not found', 404);
        }

        return $post;
    }
}