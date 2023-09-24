<?php

namespace BeerAPI\Domain;

use Shared\Domain\DomainError;

final class BeerNotExist extends DomainError
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'beer_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The beer <%s> does not exist', $this->id);
    }
}
