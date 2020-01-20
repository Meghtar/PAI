<?php

class City {
    private $id;
    private $name;
    private $location;

    public function __construct(
        int $id,
        string $name,
        int $location
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): int
    {
        return $this->location;
    }
}

?>