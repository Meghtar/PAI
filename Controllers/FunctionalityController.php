<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/Post.php';
require_once __DIR__.'/../Repository/PostRepository.php';

class FunctionalityController extends AppController {
    public function board()
    {
        $postRepository = new PostRepository();

        $posts = $postRepository->getPosts(); // TODO: probably should load with AJAX

        //var_dump($posts);
        //die();
        $this->render('board',  ['posts' => $posts]);
    }

    public function add_post()
    {
        $this->render('add_post');
    }
}
?>