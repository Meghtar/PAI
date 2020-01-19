<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/Post.php';
require_once __DIR__.'/../Repository/PostRepository.php';

class UploadController extends AppController {
    const MAX_FILE_SIZE = 1024*1024; // TODO: probably to change
    const SUPPORTED_TYPES =  ['image/png'];

    private $message = [];

    public function __construct() {
        parent::__construct();
    }

    public function add() {
        if($this->isPost())
        {
            $postRepository = new PostRepository();

            // $photo = doPhoto($_POST['image']);

            $postRepository->addPost($_POST['title'], $_POST['content'], $_POST['post_localization'], $_POST['city'], $_POST['image']);
            // TODO: add checks
        }
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=board");
        return;
    }

    public function doPhoto() {
        return null; // TODO
    }
}
?>