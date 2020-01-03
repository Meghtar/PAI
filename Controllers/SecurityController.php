<?php
require_once 'AppController.php';

class SecurityController extends AppController {
    public function login()
    {
        $this->render('login');
    }
    public function register()
    {
        $this->render('register');
    }
    public function reset()
    {
        $this->render('reset');
    }
}
?>