<?php

namespace App\Shared\Infrastructure\Symfony;

use Symfony\Component\HttpFoundation\Response;

final class ApiHttpExceptionsStatusCodeMapping
{
    private const DEFAULT_STATUS_CODE = Response::HTTP_INTERNAL_SERVER_ERROR;

    private $exceptions = [ Response::HTTP_BAD_REQUEST,
                            Response::HTTP_NOT_FOUND,
                          ];

    public function exists( $statusCode ): bool
    {
        return array_key_exists($statusCode, $this->exceptions);
    }

}
