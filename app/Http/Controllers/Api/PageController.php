<?php

namespace App\Http\Controllers\Api;

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
     
        return response()->json(PageResource::collection($pages));
    }

    public function show(string $id)
    {
        $page = $this->pageRepository->show($id);

        return response()->json(new PageResource($page));
    }
}