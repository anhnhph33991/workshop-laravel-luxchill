<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ApiResponse
{
    public static function success($message = '', $keyName, $data = null, $code = Response::HTTP_OK)
    {
        return response()->json([
            'message' => $message,
            $keyName => $data
        ], $code);
    }

    public static function colection($keyName = 'data', $data = null, $code = Response::HTTP_OK)
    {
        return response()->json([
            $keyName => $data
        ], $code);
    }

    public static function delete($message = '', $code = Response::HTTP_NO_CONTENT)
    {
        return response()->json([
            'message' => $message
        ], $code);
    }

    public static function error(
        $message = 'Not Found',
        $code = Response::HTTP_BAD_REQUEST
    ) {
        return response()->json([
            'error' => $message
        ], $code);
    }

    public static function notFound($message = 'Not Found')
    {
        return self::error($message, Response::HTTP_NOT_FOUND);
    }

    public static function serverError(
        $message = "Server Error"
    ) {
        return self::error($message, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
