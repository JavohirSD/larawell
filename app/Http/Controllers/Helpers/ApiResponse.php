<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * Return class object as JSON
     *
     * @param mixed $data
     * @param bool $status
     * @param int $status_code
     * @param mixed $error_message
     *
     * @return JsonResponse
     */
    public static function json(mixed $data, bool $status, int $status_code, mixed $error_message = null) : JsonResponse
    {
        $response = ['status' => $status];

        if($data !== null){
            $response['data'] = $data;
        }

        if($error_message){
            $response['errors'] = $error_message;
        }

        return response()->json($response, $status_code);
    }
}
