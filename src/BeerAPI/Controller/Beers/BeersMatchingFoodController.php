<?php

namespace App\BeerAPI\Controller\Beers;

use App\BeerApplication\Application\MatchingFood\MatchingFoodSearcher;
use App\Shared\Infrastructure\Output\RequestResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class BeersMatchingFoodController extends AbstractController
{

    public function __invoke( string $criteria, MatchingFoodSearcher $searcher, RequestResponse $requestResponse )
    {
        try {
            return $requestResponse->outPut( 200,  $searcher->search( $criteria ) );
        }
        catch (\Exception $e) {
            return $requestResponse->outPut( $e->getCode(), ['error-api' => $e->getMessage()] );
        }
    }
}
