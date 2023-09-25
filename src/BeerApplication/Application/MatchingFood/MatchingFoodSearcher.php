<?php

namespace App\BeerApplication\Application\MatchingFood;

use App\BeerApplication\Domain\Beer;
use App\BeerApplication\Domain\BeerRepository;
use function Lambdish\Phunctional\map;

final class MatchingFoodSearcher
{
    private $repository;

    public function __construct( BeerRepository $repository )
    {
        $this->repository = $repository;
    }

    public function search(string $criteria): array
    {
        return map($this->toResponse(), $this->repository->matchingFood( $criteria ));
    }

    private function toResponse(): callable
    {
        return static function ( $beer_response ) {
            $beer = Beer::fromPrimitives( $beer_response );
            return $beer->toPrimitives();
        };
    }
}
