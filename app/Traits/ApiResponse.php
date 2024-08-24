<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

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

    public function jsonResponse($data = null, $appendBefore = [], $appendAfter = [], $message = null, $success = true, $errors = null, $status = 200)
    {
        $response = [
            'result' => $success ? 'success' : 'failed',
            'code' => $status,
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

        return response()->json($response, $status);
    }

    public function paginatedJsonResponse($data, $resource, $status = 200)
    {
        return $this->jsonResponse(
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
            status: $status
        );
    }
}
