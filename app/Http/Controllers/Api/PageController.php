<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Pagination;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Repositories\PageRepository;

class PageController extends Controller
{
    public function __construct(
        public PageRepository $pageRepository
    ){}
    
    public function index(Request $request)
    {
        $pages = $this->pageRepository->index($request);
        
        return ResponseFormatter::success(
            PageResource::collection($pages),
            'Pages retrieved successfully',
            Pagination::getPagination($pages)
        );
    }

    public function show(string $id)
    {
        $page = $this->pageRepository->show($id);

        if (!$page) {
            return ResponseFormatter::error(
                null,
                'Page not found',
                404
            );
        }

        return ResponseFormatter::success(
            PageResource::make($page),
            'Page retrieved successfully'
        );
    }
}