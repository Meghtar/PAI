<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/Post.php';
require_once __DIR__.'/../Repository/PostRepository.php';

class FunctionalityController extends AppController {
    public function board()
    {
        $postRepository = new PostRepository();

        $posts = $postRepository->getPosts(); // TODO: probably should load with AJAX

        $this->render('board',  ['posts' => $posts]);
    }

    public function map()
    {
        $this->render('map');
    }

    public function city()
    {
        $this->render('city');
    }

    public function settings()
    {
        $this->render('settings');
    }

    public function profile()
    {
        $this->render('profile');
    }

    public function about_logged()
    {
        $this->render('about_logged');
    }

    public function add_post()
    {
        $this->render('add_post');
    }
}
?>