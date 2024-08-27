<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

trait ApiResponse
{
    public function throwValidationException(string $message): void
    {
        throw ValidationException::withMessages(['message' => $message]);
    }

    public function showMessage(string $message, int $status = 200, string $key = 'message'): JsonResponse
    {
        return new JsonResponse([$key => $message], $status);
    }

    public function sendJsonResponse(
        $data = null,
        $appendBefore = [],
        $appendAfter = [],
        $message = null,
        $success = true,
        $errors = null,
        $statusCode = 200,
    ): JsonResponse {
        $response = [
            'result' => $success ? 'success' : 'failed',
            'code' => $statusCode,
            'timestamp' => now(),
        ];

        if (!is_null($message)) {
            $response['message'] = $message;
        }

        if (!empty($appendBefore)) {
            $response = array_merge($appendBefore, $response);
        }

        if (!empty($data)) {
            $response['data'] = $data;
        }

        if (!empty($appendAfter)) {
            $response = array_merge($response, $appendAfter);
        }

        if (!is_null($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }

    public function paginatedJsonResponse(
        $data,
        $resource,
        $statusCode = 200,
    ): JsonResponse {
        return $this->sendJsonResponse(
            data: $data,
            appendBefore: [
                'currentPage' => $resource->currentPage(),
                'totalPages' => $resource->lastPage(),
                'itemsPerPage' => $resource->perPage(),
                'totalItems' => $resource->total(),
            ],
            appendAfter: [
                'links' => [
                    'first' => $resource->url(1),
                    'prev' => $resource->previousPageUrl(),
                    'next' => $resource->nextPageUrl(),
                    'last' => $resource->url($resource->lastPage())
                ]
            ],
            statusCode: $statusCode
        );
    }

    /////////////////

    public static function rollback(
        $e,
        $message = 'Something went wrong! Process not completed',
    ): JsonResponse {
        DB::rollBack();
        return self::throw($e, $message);
    }

    public static function throw(
        $e,
        $message = 'Something went wrong! Process not completed',
    ): JsonResponse {
        Log::info($e);
        throw new HttpResponseException(
            response()->json(
                ['message' => $message, 'statusCode' => 500, 'details' => $e],
                500,
            ),
        );
    }

    // public static function sendResponse($result, $message, $statusCode = 200)
    // {
    //     $response = [
    //         'success' => true,
    //         'data'    => $result
    //     ];
    //     if (!empty($message)) {
    //         $response['message'] = $message;
    //     }
    //     return response()->json($response, $statusCode);
    // }
}
