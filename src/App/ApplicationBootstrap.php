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
        $context->addGet('/', new ListController());
        $context->addGet('/create', new CreateController());
        $context->addPost('/create', new CreateSubmitController());
    }
}