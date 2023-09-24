<?php

namespace BeerAPI\Application\GetOne;

use BeerAPI\Application\BeerResponse;
use BeerAPI\Domain\BeerNotExist;
use BeerAPI\Domain\BeerRepository;

final class BeerGetter
{
    private $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id): Beer
    {
        $beer = $this->repository->getOne($id);

        if (null === $beer) {
            throw new BeerNotExist($id);
        }

        return $beer;
    }
}
