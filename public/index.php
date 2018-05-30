<?php

/* 

composer autoload

*/

require_once "../vendor/autoload.php";
/*

Routing

*/


$router = new \core\Router();

$router->add("home","home@index");
$router->add("about","about@index");

$router->go($_SERVER['QUERY_STRING']);



