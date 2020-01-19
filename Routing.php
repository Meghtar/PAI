<?php
require_once('Controllers/SecurityController.php');
require_once('Controllers/FunctionalityController.php');
require_once('Controllers/MiscController.php');
require_once('Controllers/UploadController.php');

class Routing {
    public $routes = [];

    function __construct() {
        $this->routes = [
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
            'board' => [
                'controller' => 'FunctionalityController',
                'action' => 'board'
            ],
            'add_post' => [
                'controller' => 'FunctionalityController',
                'action' => 'add_post'
            ],
            'upload' => [
                'controller' => 'UploadController',
                'action' => 'add'
            ],
            'welcome' => [
                'controller' => 'MiscController',
                'action' => 'welcome'
            ],
            'about' => [
                'controller' => 'MiscController',
                'action' => 'about'
            ],
            'not_found' => [
                'controller' => 'MiscController',
                'action' => 'not_found'
            ],
            'error' => [
                'controller' => 'MiscController',
                'action' => 'error'
            ]
        ];
    }

    function run() {
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
            $object->$action();
        }
    }
}
?>