<?php

/* 

composer autoload

*/

require_once "../vendor/autoload.php";
/*

Routing

*/


$router = new \core\Router();

$router->get("home","home@index");
$router->get("about","about@index");

$router->go($_SERVER['QUERY_STRING'], $_SERVER['REQUEST_METHOD']);




