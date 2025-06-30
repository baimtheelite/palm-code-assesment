<?php

namespace App\Helpers;

class Pagination {

    public static function getPagination($data)
    {
        if($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            return [
                'total'         => $data->total(),
                'per_page'      => $data->perPage(),
                'current_page'  => $data->currentPage(),
                'last_page'     => $data->lastPage(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
                'from'          => $data->firstItem(),
                'to'            => $data->lastItem()
            ];
        }

        return null;
    }
}