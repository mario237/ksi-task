<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;


trait HandleApiResponse
{

    public function successResponse($key , $data , $message = ''): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            $key => $data
        ]);
    }


    public function errorResponse($message , $code): JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $message,
            'code' => $code
        ] , $code);
    }


}
