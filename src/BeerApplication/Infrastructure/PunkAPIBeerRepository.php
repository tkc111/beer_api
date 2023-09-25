<?php

namespace App\BeerApplication\Infrastructure;

use App\BeerApplication\Domain\Beer;
use App\BeerApplication\Domain\BeerRepository;
use App\Shared\Infrastructure\Symfony\ApiHttpClient;

final class PunkAPIBeerRepository implements BeerRepository
{
    private const PUNKAPI_URI = 'https://api.punkapi.com/v2/beers';
    private $http_client;

    public function __construct( ApiHttpClient $http_client )
    {
        $this->http_client = $http_client;
    }

    public function getOne( string $id ): Beer
    {
        return Beer::fromPrimitives( $this->http_client->fetch( self::PUNKAPI_URI . '/' . $id )[0] );
    }

    public function matchingFood( string $criteria ): array
    {
        return $this->http_client->fetch( self::PUNKAPI_URI . '?food=' . $criteria );
    }
}
