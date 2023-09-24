<?php

namespace BeerAPI\Infrastructure;

use BeerAPI\Domain\Beer;
use BeerAPI\Domain\BeerRepository;
use Shared\Infrastructure\Symfony\ApiHttpClient;

final class PunkAPIBeerRespository implements BeerRepository
{
    private const PUNKAPI_URI = 'https://api.punkapi.com/v2/beers';

    public function getOne(string $id): ?Beer
    {
        $http_client = new ApiHttpClient();

        return Beer::fromPrimitives( $http_client->fetch( self::PUNKAPI_URI ) );
    }

    public function matchingFood(string $criteria): array
    {
        // TODO: Implement matchingFood() method.
    }
}
