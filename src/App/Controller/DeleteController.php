<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Flash;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;
use Gasparik\Lib\Websupport\WebsupportApi;

class DeleteController implements Controller
{
    private $domain;
    private $websupportApi;

    public function __construct($config)
    {
        $this->domain = $config['websupport']['domain'];
        $this->websupportApi = new WebsupportApi($config['websupport']);
    }

    public function execute(Request $request): Response
    {
        $response = $this->websupportApi->deleteDnsRecord($this->domain, $request->getInput('id', 0));
        if (!isset($response['status']) || $response['status'] !== 'success') {
            Flash::error('API does not accept data');
            return Response::redirect('/');
        }

        Flash::success('Deleted');
        return Response::redirect('/');
    }
}
