<?php

namespace App\Shared\Infrastructure\Symfony;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiHttpClient
{
    private $client;

    public function __construct( HttpClientInterface $client )
    {
        $this->client = $client;
    }

    public function fetch( $uri ): array
    {
        $response = $this->client->request( 'GET', $uri );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200

        return $response->toArray();
    }
}
