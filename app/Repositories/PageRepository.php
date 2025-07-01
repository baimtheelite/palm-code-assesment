<?php

namespace App\Repositories;

use App\Helpers\ResponseFormatter;
use App\Models\Page;
use Illuminate\Http\Request;

class PageRepository
{
    public function baseQuery()
    {
        return Page::query()->where('status', 'published');
    }
    
    public function index(Request $request)
    {
        $show = $request->query('show', 15);

        $pages = $this->baseQuery()->paginate($show);

        return $pages;
    }

    public function show(string $id)
    {
        $page = $this->baseQuery()->where('id', $id)->orWhere('slug', $id)->first();

        return $page;
    }
}