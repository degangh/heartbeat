<?php

require __DIR__ . "/vendor/autoload.php";

$controller =  (!empty($_GET['c'])) ? $_GET['c'] : "about";

$controller = "\\app\controller\\". $controller;

$method = (!empty($_GET['m'])) ? $_GET['m'] : "index";

if (class_exists($controller)){
    $c = new $controller();
}
else{
    $e = new Exception("Class Not Found" . " - " . $controller);

    echo $e->getMessage();
}

if (!isset($e)){
    if (method_exists($c, $method)){
        $c->$method();
    }
    else{
        
        $e = new Exception("Method Not Found" . " - " . $controller . "::" . $method);

        echo $e->getMessage();
    }
}


