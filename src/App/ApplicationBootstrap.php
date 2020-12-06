<?php

namespace Gasparik\App;

use Gasparik\App\Controller\CreateController;
use Gasparik\App\Controller\CreateSelectController;
use Gasparik\App\Controller\CreateSubmitController;
use Gasparik\App\Controller\DeleteController;
use Gasparik\App\Controller\ListController;
use Gasparik\Lib\Application\Bootstrap;
use Gasparik\Lib\Application\Context\RouterContext;
use Gasparik\Lib\Websupport\WebsupportApi;

class ApplicationBootstrap extends Bootstrap
{
    public function routes(RouterContext $context)
    {
        $config = require '../src/App/Config/env.php';
        $websupporApi = new WebsupportApi($config['websupport']);

        $context->addGet('/', new ListController($websupporApi, $config['websupport']['domain']));
        $context->addGet('/createselect', new CreateSelectController());
        $context->addGet('/create', new CreateController());
        $context->addPost('/create', new CreateSubmitController($websupporApi));
        $context->addPost('/delete', new DeleteController($websupporApi));
    }
}