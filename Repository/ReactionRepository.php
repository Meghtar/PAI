<?php

require_once "Repository.php";

class ReactionRepository extends Repository {
    public function addUserLike($user_id, $post_id)
    {
        $pdo = $this->database->connect();
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare('
                INSERT INTO user_likes(user_id, post_id) VALUES (:user_id, :post_id)
            ');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_STR);
            $stmt->execute();

            $pdo->commit();
        } catch(\Exception $e) {
            $pdo->rollback();
            throw $e;
        }
    }

    public function removeUserLike($user_id, $post_id)
    {
        // TODO
    }

    public function addUserDislike($user_id, $post_id)
    {
        $pdo = $this->database->connect();
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare('
                INSERT INTO user_dislikes(user_id, post_id) VALUES (:user_id, :post_id)
            ');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_STR);
            $stmt->execute();

            $pdo->commit();
        } catch(\Exception $e) {
            $pdo->rollback();
            throw $e;
        }
    }

    public function removeUserDislike($user_id, $post_id)
    {
        
    }

    public function getPostLikes($post_id): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT COUNT(user_id) FROM user_likes WHERE post_id = :post_id
        ');
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $result['COUNT(user_id)'];
        
        return $result;
    }

    public function getPostDislikes($post_id): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT COUNT(user_id) FROM user_dislikes WHERE post_id = :post_id
        ');
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $result['COUNT(user_id)'];
        
        return $result;
    }

    public function getUserLikes($user_id): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT COUNT(post_id) FROM user_likes WHERE user_id = :user_id
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $result['COUNT(post_id)'];
        
        return $result;
    }

    public function getUserDislikes($user_id): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT COUNT(post_id) FROM user_dislikes WHERE user_id = :user_id
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $result['COUNT(post_id)'];
        
        return $result;
    }

}
?>