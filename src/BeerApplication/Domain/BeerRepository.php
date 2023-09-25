<?php

namespace App\BeerApplication\Domain;

use BeerAPI\Application\BeerResponse;
use CodelyTv\Shared\Domain\Criteria\Criteria;

interface BeerRepository
{
    public function getOne(string $id): ?Beer;

    public function matchingFood(string $criteria): array;
}
