<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Flash;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;
use Gasparik\Lib\Validation\CsrfRule;
use Gasparik\Lib\Validation\RequiredRule;
use Gasparik\Lib\Validation\Validation;
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
        $validator = Validation::makeWithCsrf([]);
        $errors = $validator->validate($request->getInputList());
        if (!empty($errors)) {
            $errroKey = array_key_first($errors);
            Flash::error($errors[$errroKey]);
            return Response::redirect('/');
        }

        $response = $this->websupportApi->deleteDnsRecord($request->getInput('id', 0));
        if (!isset($response['status']) || $response['status'] !== 'success') {
            // todo: improve error message. Use response error message if it provides some additional information for user
            // todo: add logging
            Flash::error('Request refused by websupport API');
            return Response::redirect('/');
        }

        Flash::success('Deleted');
        return Response::redirect('/');
    }
}
