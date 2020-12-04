<?php

namespace Gasparik\Lib\Application\Context;

use Gasparik\Lib\Application\Controller;

class ApplicationContext implements RouterContext
{
    private $routes = [];

    public function getRoutes()
    {
        return $this->routes;
    }
    
    public function addPost($path, Controller $controller)
    {
        $this->addRoute('POST', $path, $controller);
    }

    public function addGet($path, Controller $controller)
    {   
        $this->addRoute('GET', $path, $controller);
    }

    public function addRoute($method, $path, Controller $controller)
    {
        if (!isset($this->routes[$path])) {
            $this->routes[$path] = [];
        }
        $this->routes[$path][$method] = $controller;
    }
}