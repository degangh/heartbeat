<?php

/* 

composer autoload

*/

require_once "../vendor/autoload.php";
/*

Routing

*/

use \core\Router;
use \core\Request;

$uri = Request::uri();  

$router = new Router();

$router->get("home","home@index");
$router->get("about","about@index");

$router->go($uri, $_SERVER['REQUEST_METHOD']);


