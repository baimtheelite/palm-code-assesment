<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Pagination;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $show = $request->query('show', 15);

        $categories = Category::paginate($show);

        return ResponseFormatter::success(
            CategoryResource::collection($categories),
            'Categories retrieved successfully',
            Pagination::getPagination($categories)
        );
    }

    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return ResponseFormatter::success(
            CategoryResource::make($category),
            'Category retrieved successfully'
        );
    }
}