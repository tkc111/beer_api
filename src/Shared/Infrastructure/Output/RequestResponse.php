<?php

namespace App\Shared\Infrastructure\Output;

use App\Shared\Domain\Output\OutputRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RequestResponse implements OutputRepository
{
    public function outPut( int $status, $response ): JsonResponse
    {
        return new JsonResponse(
            $response,
            $status,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}