<?php
namespace core;


class Router
{
  public $routes = [
    "GET" => [],
    "POST" => []
  ];
  public function define($routes)
  {
    $this->routes = $routes;
  }
  public function get($uri, $controller)
  {
    $this->routes["GET"][$uri] = $controller;
  }
  public function post($uri, $controller)
  {
    $this->routes["POST"][$uri] = $controller;
  }
  public function direct($uri, $requestType)
  {
    if (array_key_exists($uri, $this->routes[$requestType]))
    {
      return $this->routes[$requestType][$uri];
    }
    else {
      throw new Exception("No route defined");
    }
  }
  public static function load($file)
  {
    $router = new self;
    require $file;
    return $router;
  }
}