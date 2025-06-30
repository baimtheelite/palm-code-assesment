<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Pagination;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    public function __construct(
        public PostRepository $postRepository
    ){}
    public function index(Request $request)
    {
        $posts = $this->postRepository->index($request);

        return ResponseFormatter::success(PostResource::collection($posts), 'Posts retrieved successfully', Pagination::getPagination($posts));
    }

    public function show(string $id)
    {
        // $post = Post::where('status', 'published')->where('id', $id)->first();
        $post = $this->postRepository->show($id);
        
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return  ResponseFormatter::success(PostResource::make($post), 'Post retrieved successfully');
    }
}