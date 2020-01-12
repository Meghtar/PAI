<?php

class User {
    private $id;
    private $password;
    private $email;
    private $name;

    public function __construct(
        string $email,
        string $name,
        string $password,
        int $id = null
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->id = $id;
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
}
?>