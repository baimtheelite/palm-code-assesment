<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Redis;

/**
 * Format response.
 */
class ResponseFormatter
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null,
        ],
        'data' => null,
        'pagination' => null,
    ];

    /**
     * Give success response.
     */
    public static function success($data = null, $message = null, $pagination = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;
        self::$response['pagination'] = $pagination;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    /**
     * Give error response.
     */
    public static function error($data = null, $message = null, $code = 400, $pagination = null)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;
        self::$response['pagination'] = $pagination;        

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
