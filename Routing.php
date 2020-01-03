<?php
require_once('Controllers/SecurityController.php');

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
            'default' => [
                'controller' => 'SomethingWrongController',
                'action' => 'error404' // TODO
            ],
            'login111' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ]
        ];
    }

    function run() {
        $page = isset($_GET['page']) && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'default';
        echo $page;
        if($this->routes[$page]) {
            $className = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];
            $object = new $className;
            var_dump($action);
            $object->$action();
        }
    }
}
?>