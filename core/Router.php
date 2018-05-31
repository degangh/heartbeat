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
        try
        {
            if (!array_key_exists($uri,$this->routes)) throw new \Exception("No route defined");
            $handler = $this->routes[$uri];
        
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