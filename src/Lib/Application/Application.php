<?php

namespace Gasparik\Lib\Application;

use Gasparik\Lib\Application\Context\ApplicationContext;
use Gasparik\Lib\Request\Request;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public static function boot(Bootstrap $bootstrap): Application
    {
        $context = new ApplicationContext();
        $bootstrap->routes($context);
        return new Application(
            new Router($context->getRoutes())
        );
    }

    public function run()
    {
        $request = Request::fromClient();
        $response = $this->handleRequest($request);
        $this->handleResponse($response);
    }

    public function handleRequest(Request $request)
    {
        $controller = $this->router->getController($request);
        return $controller->execute($request);
    }

    public function handleResponse($response)
    {
        echo $response;
    }
}