<?php

namespace App\BeerAPI\Controller\Beers;

use App\BeerApplication\Application\GetOne\BeerGetter;
use App\Shared\Infrastructure\Output\RequestResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class BeersGetController extends AbstractController
{
    public function __invoke( string $id, BeerGetter $beerGetter, RequestResponse $requestResponse )
    {
        try {
            return $requestResponse->outPut( 200, $beerGetter->__invoke( $id )->toPrimitives() );
        }
        catch (\Exception $e) {
            return $requestResponse->outPut( $e->getCode(), ['error-api' => $e->getMessage()] );
        }
    }
}
