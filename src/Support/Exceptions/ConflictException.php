<?php

declare(strict_types=1);

namespace Support\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ConflictException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(
            [
                'error' => $this->getMessage(),
            ],
            Response::HTTP_CONFLICT
        );
    }
}
