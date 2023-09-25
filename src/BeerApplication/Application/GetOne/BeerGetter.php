<?php

namespace App\BeerApplication\Application\GetOne;

use App\BeerApplication\Domain\Beer;
use App\BeerApplication\Domain\BeerRepository;

final class BeerGetter
{
    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id): ?Beer
    {
        return $this->repository->getOne($id);
    }
}
