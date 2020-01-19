<?php
require_once 'AppController.php';

class GuestController extends AppController {
    public function welcome()
    {
        $this->render('welcome');
    }
    public function about()
    {
        $this->render('about');
    }
    public function not_found()
    {
        $this->render('not_found');
    }
    public function error()
    {
        $this->render('error');
    }
}
?>