<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/Post.php';
require_once __DIR__.'/../Repository/UserRepository.php';

class PostRepository extends Repository {

    public function getPosts(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts
        ');
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) {
            $result[] = new Post(
                $post['post_id'],
                $post['post_title'],
                $post['post_localization'],
                $post['post_city'],
                $post['post_likes'],
                $post['post_dislikes'],
                $post['post_shares'],
                $post['post_content'],
                $post['post_datetime'],
                $post['post_comments'],
                $post['post_picture']
            );
        }

        return $result;
    }

    public function addPost($title, $content, $localization, $city, $picture) 
    {
        $pdo = $this->database->connect();
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare('
            INSERT INTO posts
            (post_id, user_id, post_title, post_localization, post_city, post_likes, post_dislikes, post_shares, post_comments, post_content, post_datetime, post_picture) 
            VALUES 
            (NULL, :user_id, :title, :localization, :city, 0, 0, 0, 0, :content, :dt, :picture)
            ');

            $date = date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s')));

            $userRepository = new UserRepository();

            $user_id = $userRepository->getUserByEmail($_SESSION['email'])->getId();

            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':localization', $localization, PDO::PARAM_INT);
            $stmt->bindParam(':city', $city, PDO::PARAM_INT);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(":dt", $date, PDO::PARAM_STR);
            $stmt->bindParam(':picture', $picture, PDO::PARAM_LOB);
            $stmt->execute();

            $pdo->commit();
        } catch(\Exception $e) {
            $pdo->rollback();
            throw $e;
        }
    }

    public function getAllPostsFromLocalization($location): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts WHERE post_localization = :location
        ');
        $stmt->bindParam(':location', $location, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) {
            $result[] = new Post(
                $post['post_id'],
                $post['post_title'],
                $post['post_localization'],
                $post['post_city'],
                $post['post_likes'],
                $post['post_dislikes'],
                $post['post_shares'],
                $post['post_content'],
                $post['post_datetime'],
                $post['post_comments'],
                $post['post_picture']
            );
        }

        return $result;
    }

    public function getAllPostsFromCity($city): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts WHERE post_city = :city
        ');
        $stmt->bindParam(':city', $city, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) {
            $result[] = new Post(
                $post['post_id'],
                $post['post_title'],
                $post['post_localization'],
                $post['post_city'],
                $post['post_likes'],
                $post['post_dislikes'],
                $post['post_shares'],
                $post['post_content'],
                $post['post_datetime'],
                $post['post_comments'],
                $post['post_picture']
            );
        }

        return $result;
    }

    public function getLastPost() {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts ORDER BY post_datetime DESC LIMIT 1
        ');
        $stmt->execute();
        $post = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        
        $result = new Post(
            $post['post_id'],
            $post['post_title'],
            $post['post_localization'],
            $post['post_city'],
            $post['post_likes'],
            $post['post_dislikes'],
            $post['post_shares'],
            $post['post_content'],
            $post['post_datetime'],
            $post['post_comments'],
            $post['post_picture']
        );
        return $result;
    }

    public function getNLastPostsButLast($amount) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts ORDER BY post_datetime DESC LIMIT 1,:amount
        ');
        $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($posts);
        //die();

        return $posts;
    }
}
?>