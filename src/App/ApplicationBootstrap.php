<?php

namespace Gasparik\App;

use Gasparik\App\Controller\CreateController;
use Gasparik\App\Controller\CreateSubmitController;
use Gasparik\App\Controller\ListController;
use Gasparik\Lib\Application\Bootstrap;
use Gasparik\Lib\Application\Context\RouterContext;

class ApplicationBootstrap extends Bootstrap
{
    public function routes(RouterContext $context)
    {
        $config = require '../src/App/Config/env.php';

        $context->addGet('/', new ListController($config));
        $context->addGet('/create', new CreateController());
        $context->addPost('/create', new CreateSubmitController($config));
    }
}