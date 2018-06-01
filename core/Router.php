<?php
namespace core;
class Router 
{
    protected $routes = array(
        "POST" => array(),
        "GET" => array()
    );
    
    public function post($uri, $handler)
    {
        $this->routes['POST'][$uri] = $handler;
    }

    public function get($uri, $handler)
    {
        $this->routes['GET'][$uri] = $handler;
    }

    /* todo
    public function patch($uri, $handler)
    {
        $this->routes[$uri] = $handler;
    }
    */

    public function go($uri, $request_type)
    {
        try
        {
            if (!array_key_exists($uri,$this->routes[$request_type])) throw new \Exception("No route defined");
            $handler = $this->routes[$request_type][$uri];
        
            $controller = explode("@", $handler)[0];
            $method = explode("@", $handler)[1];

            $controller = "app\controller\\".$controller;
            
            if (!class_exists($controller)) throw new \Exception("Module not defined");

            $c = new $controller();

            if (!method_exists($c, $method)) throw new \Exception("Action not defined");

            $c->$method();
        }
        catch(\Exception $e)
        {
            var_dump($e->getMessage());
        }
        
    }

}