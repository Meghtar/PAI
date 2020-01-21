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
            $user['password'],
            $user['default_city_id'],
            $user['role_id'],
            $user['user_id']
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
            $user['password'],
            $user['default_city_id'],
            $user['role_id'],
            $user['user_id']
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
                $user['default_city_id'],
                $user['role_id'],
                $user['user_id']
            );
        }

        return $result;
    }

    public function addUser(string $email, string $name, string $password)
    {
        $pdo = $this->database->connect();
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare('
                INSERT INTO users(email, name, password, default_city_id) VALUES (:email, :name, :password, 1)
            ');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

            $pdo->commit();
        } catch(\Exception $e) {
            $pdo->rollback();
            throw $e;
        }
    }
}
?>