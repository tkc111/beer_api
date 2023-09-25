<?php

namespace App\Shared\Domain\Output;

interface OutputRepository
{
    /**
     * @param int $status
     * @param array|string|int|bool $response
     * @return mixed
     */
    public function outPut(
        int $status,
        $response
    );
}