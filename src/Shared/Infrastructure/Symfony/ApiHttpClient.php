<?php

namespace App\Shared\Infrastructure\Symfony;

use App\Shared\Infrastructure\Output\HttpClientResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiHttpClient
{
    private $client;

    public function __construct( HttpClientInterface $client )
    {
        $this->client = $client;
    }

    public function fetch( $uri ): HttpClientResponse
    {
        $response = $this->client->request( 'GET', $uri );
        return new HttpClientResponse( $response->getStatusCode(), $response->toArray() );
    }
}
