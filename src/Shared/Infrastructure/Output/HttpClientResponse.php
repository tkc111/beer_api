<?php

namespace App\Shared\Infrastructure\Output;

use App\Shared\Domain\Output\OutputRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

final class HttpClientResponse
{
    private $status_code;
    private $data;

    public function __construct( int $status_code, array $data )
    {
        $this->status_code  = $status_code;
        $this->data         = $data;
    }

    public function statusCode(): int
    {
        return $this->status_code;
    }

    public function data(): array
    {
        return $this->data;
    }
}