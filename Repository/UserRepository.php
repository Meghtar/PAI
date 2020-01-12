<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/User.php';

class UserRepository extends Repository {

    public function getUserByEmail(string $email): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['name'],
            $user['password']
        );
    }

    public function getUserByName(string $name): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['name'],
            $user['password']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['name'],
                $user['password'],
                $user['id']
            );
        }

        return $result;
    }

    public function addUser(string $email, string $name, string $password): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users(email, name, password) VALUES (:email, :name, :password)
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['name'],
            $user['password']
        );
    }
}
?>