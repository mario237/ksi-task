<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;


trait HandleApiResponse
{

    public function successResponse($data , $message = ''): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);
    }


    public function errorResponse($message , $code): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => $message,
            'code' => $code
        ] , $code);
    }
}
