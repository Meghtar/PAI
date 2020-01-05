<?php
require_once('Controllers/SecurityController.php');
require_once('Controllers/FunctionalityController.php');
require_once('Controllers/MiscController.php');

class Routing {
    public $routes = [];

    function __construct() {
        $this->routes = [
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'reset' => [
                'controller' => 'SecurityController',
                'action' => 'reset'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'board' => [
                'controller' => 'FunctionalityController',
                'action' => 'board'
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
            ]
        ];
    }

    function run() {
        if(isset($_GET['page']) === false)
            $page = 'welcome';
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