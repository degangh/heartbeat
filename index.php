<?php

require "vendor/autoload.php";

$controller = $_GET['m'];

$c = new $controller();

$c->index();
