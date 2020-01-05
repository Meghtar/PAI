<?php

//var_dump($_GET);
//var_dump($_POST);
require_once('Routing.php');

$routing = new Routing();

$routing->run();
?>