<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/Post.php';
require_once __DIR__.'/../Repository/PostRepository.php';
require_once __DIR__.'/../Repository/CityRepository.php';
require_once __DIR__.'/../Repository/UserRepository.php';
require_once __DIR__.'/../Repository/LocationRepository.php';

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
            $cityRepository = new CityRepository();
            $city_id = $cityRepository->getCityIdByName($_POST['city']); // TODO: add check if city not found

            $locationRepository = new LocationRepository();
            $location_id = $locationRepository->addLocation($_POST['post_localization'], $_POST['position']);

            // $photo = doPhoto($_POST['image']);
            $postRepository = new PostRepository();

            $postRepository->addPost($_POST['title'], $_POST['content'], $location_id, $city_id, $_POST['image']);
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