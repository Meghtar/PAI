<?php
require_once 'AppController.php';

class FunctionalityController extends AppController {
    public function board()
    {
        $this->render('board');
    }
}
?>