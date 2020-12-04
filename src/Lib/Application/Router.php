<?php

namespace Gasparik\Lib\Application;

use Gasparik\Lib\Application\Exception\MethodNotAllowedException;
use Gasparik\Lib\Request\Request;

class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function getController(Request $request): ?Controller
    {
        $requestPath = $request->getUrl()->getPath();
        $requestMethod = $request->getMethod();
        foreach ($this->routes as $path => $route) {
            if (!$this->isMatch($requestPath, $path)) {
                continue;
            }
            if (!isset($route[$requestMethod])) {
                throw new MethodNotAllowedException("Method is not allowed: " . $requestMethod);
            }
            return $route[$request->getMethod()];
        }
        throw new MethodNotAllowedException("Route was not found: " . $requestPath);
    }

    private function isMatch($path, $route)
    {
        return $path === $route;
    }
}