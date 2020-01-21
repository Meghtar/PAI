<?php

class User {
    private $id;
    private $password;
    private $email;
    private $name;
    private $defaultCity;
    private $role;

    public function __construct(
        string $email,
        string $name,
        string $password,
        int $defaultCity,
        int $role,
        int $id = null
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->id = $id;
        $this->defaultCity = $defaultCity;
        $this->role = $role;
    }

    public function getRole(): int
    {
        return $this->role;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDefaultCity(): int
    {
        return $this->defaultCity;
    }
}
?>