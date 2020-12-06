<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Flash;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;
use Gasparik\Lib\Websupport\WebsupportApi;

class DeleteController implements Controller
{
    private $websupportApi;

    public function __construct(WebsupportApi $websupportApi)
    {
        $this->websupportApi = $websupportApi;
    }

    public function execute(Request $request): Response
    {
        $response = $this->websupportApi->deleteDnsRecord($request->getInput('id', 0));
        if (!isset($response['status']) || $response['status'] !== 'success') {
            // todo: improve error message. Use response error message if it provides some additional information for user
            // todo: add logging
            Flash::error('API does not accept data');
            return Response::redirect('/');
        }

        Flash::success('Deleted');
        return Response::redirect('/');
    }
}
