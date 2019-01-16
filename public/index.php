<?php


require '../config/dev.php';
require '../config/Autoloader.php';
\App\config\Autoloader::register();

$router = new \App\config\Router();
$router->run();