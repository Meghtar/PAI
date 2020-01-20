<?php
require_once('Controllers/SecurityController.php');
require_once('Controllers/FunctionalityController.php');
require_once('Controllers/GuestController.php');
require_once('Controllers/UploadController.php');
require_once('Controllers/ReactionController.php');

class Routing {
    public $routes = [];
    //public $loggedRoutes = [];

    function __construct() {
        $this->routes = [
            'board' => [
                'controller' => 'FunctionalityController',
                'action' => 'board'
            ],
            'add_post' => [
                'controller' => 'FunctionalityController',
                'action' => 'add_post'
            ],
            'map' => [
                'controller' => 'FunctionalityController',
                'action' => 'map'
            ],
            'city' => [
                'controller' => 'FunctionalityController',
                'action' => 'city'
            ],
            'settings' => [
                'controller' => 'FunctionalityController',
                'action' => 'settings'
            ],
            'profile' => [
                'controller' => 'FunctionalityController',
                'action' => 'profile'
            ],
            'about_logged' => [
                'controller' => 'FunctionalityController',
                'action' => 'about_logged'
            ],
            'upload' => [
                'controller' => 'UploadController',
                'action' => 'add'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'reset' => [
                'controller' => 'SecurityController',
                'action' => 'reset'
            ],
            'like' => [
                'controller' => 'ReactionController',
                'action' => 'like',
            ],
            'dislike' => [
                'controller' => 'ReactionController',
                'action' => 'dislike',
            ],
            'welcome' => [
                'controller' => 'GuestController',
                'action' => 'welcome'
            ],
            'about' => [
                'controller' => 'GuestController',
                'action' => 'about'
            ],
            'not_found' => [
                'controller' => 'GuestController',
                'action' => 'not_found'
            ],
            'error' => [
                'controller' => 'GuestController',
                'action' => 'error'
            ]
        ];
    }

    function run() {
        /*var_dump($this->loggedRoutes);
        echo '<br>';
        var_dump($this->guestRoutes);
        echo '<br>';
        var_dump($routes);
        die();*/
        if(isset($_GET['page']) === false)
        {
            $page = 'welcome';
        }
        else
            $page = isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'not_found';
        if($this->routes[$page]) {
            $className = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];
            $object = new $className;
            if($action === 'like' || $action === 'dislike')
                $object->$action($_POST['post_id']);
            else
                $object->$action();
        }
    }
}
?>