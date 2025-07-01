<?php

namespace App\Repositories;

use App\Helpers\ResponseFormatter;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function baseQuery()
    {
        return Category::query();
    }
    
    public function index(Request $request)
    {
        $show = $request->query('show', 15);

        $categories = $this->baseQuery()
                    ->paginate($show);

        return $categories;
    }

    public function show(string $id)
    {
        $category = $this->baseQuery()->where('id', $id)->orWhere('slug', $id)->first();

        return $category;
    }
}