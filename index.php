<?php

require __DIR__ . "/vendor/autoload.php";

$controller = "\\app\controller\\".$_GET['m'];

$c = new $controller();

$c->index();
