<?php
namespace core;
class Router 
{
    protected $routes = array();
    
    public function add($uri, $handler)
    {
        $this->routes[$uri] = $handler;
    }

    public function go($uri)
    {
        $handler = $this->routes[$uri];

        $controller = explode("@", $handler)[0];
        $method = explode("@", $handler)[1];

        $controller = "app\controller\\".$controller;
        $c = new $controller();
        $c->$method();
    }

}