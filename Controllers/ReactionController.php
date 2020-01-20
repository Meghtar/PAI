<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/Post.php';
require_once __DIR__.'/../Repository/PostRepository.php';
require_once __DIR__.'/../Repository/UserRepository.php';
require_once __DIR__.'/../Repository/ReactionRepository.php';

class ReactionController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    public function like($post_id) 
    {
        if($this->isPost())
        {
            $userRepository = new UserRepository();

            $user_id = $userRepository->getUserByEmail($_SESSION['email'])->getId();

            $reactionRepository = new ReactionRepository();

            $reactionRepository->addUserLike($user_id, $post_id);

        }
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=board");
        return;
    }

    public function dislike($post_id) 
    {
        if($this->isPost())
        {
            $userRepository = new UserRepository();

            $user_id = $userRepository->getUserByEmail($_SESSION['email'])->getId();

            $reactionRepository = new ReactionRepository();

            $reactionRepository->addUserDislike($user_id, $post_id);

        }
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=board");
        return;
    }
}
?>