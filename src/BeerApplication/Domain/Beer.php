<?php

namespace App\BeerApplication\Domain;

final class Beer
{
    private $id;
    private $name;
    private $tagline;
    private $first_brewed;
    private $description;
    private $image;

    public function __construct(string $id, string $name, string $tagline, string $first_brewed, string $description, string $image = null)
    {
        $this->id           = $id;
        $this->name         = $name;
        $this->tagline      = $tagline;
        $this->first_brewed = $first_brewed;
        $this->description  = $description;
        $this->image        = $image;
    }

    public function toPrimitives(): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'tagline'       => $this->tagline,
            'first_brewed'  => $this->first_brewed,
            'description'   => $this->description,
            'image_url'     => $this->image,
        ];
    }

    public static function fromPrimitives( array $primitives ): Beer
    {
        return new self(    $primitives['id'],
                            $primitives['name'],
                            $primitives['tagline'],
                            $primitives['first_brewed'],
                            $primitives['description'],
                            $primitives['image_url']
                        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function tagline(): string
    {
        return $this->tagline;
    }

    public function first_brewed(): string
    {
        return $this->first_brewed;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function image(): string
    {
        return $this->image;
    }
}
