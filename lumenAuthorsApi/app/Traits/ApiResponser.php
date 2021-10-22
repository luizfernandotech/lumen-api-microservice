<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build success response
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, int $code = Response::HTTP_OK)
    {
        return response()->json([
            'data' => $data
        ], $code);
    }

    /**
     * Build an error message
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, int $code)
    {
        return response()->json([
            'code' => $code,
            'error' => $message
        ], $code);
    }
}
