<?php

namespace App\BeerApplication\Infrastructure;

use App\BeerApplication\Domain\Beer;
use App\BeerApplication\Domain\BeerRepository;
use App\Shared\Infrastructure\Symfony\ApiHttpClient;
use App\Shared\Infrastructure\Symfony\ApiHttpExceptionsStatusCodeMapping;
use Exception;

final class PunkAPIBeerRepository implements BeerRepository
{
    private const PUNKAPI_URI = 'https://api.punkapi.com/v2/beers';
    private $http_client;
    private $mapping_exceptions;

    public function __construct( ApiHttpClient $http_client, ApiHttpExceptionsStatusCodeMapping $mapping_exceptions )
    {
        $this->http_client          = $http_client;
        $this->mapping_exceptions   = $mapping_exceptions;
    }

    public function getOne( string $id ): Beer
    {
        $response = $this->http_client->fetch( self::PUNKAPI_URI . '/' . $id );

        if ( $this->mapping_exceptions->exists( $response->statusCode() ) ) {
            throw new Exception("API Exception", $response->statusCode() );
        }

        return Beer::fromPrimitives( $response->data()[0] );
    }

    public function matchingFood( string $criteria ): array
    {
        $response = $this->http_client->fetch( self::PUNKAPI_URI . '?food=' . $criteria );

        if ( $this->mapping_exceptions->exists( $response->statusCode() ) ) {
            throw new Exception("API Exception", $response->statusCode() );
        }
        return $response->data();
    }
}
