<?php
require_once 'AppController.php';

class MiscController extends AppController {
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
}
?>