<?php

namespace Gasparik\App\Controller;

use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Websupport\WebsupportApi;

class ListController implements Controller
{
    public function execute(Request $request)
    {
        $config = require '../src/App/Config/env.php';
        $websupportApi = new WebsupportApi($config['websupport']);
        $response = $websupportApi->getDnsList('php-assignment-6.ws');
        var_dump($response['items']);

        return "list";
    }
}