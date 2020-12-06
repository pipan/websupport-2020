<?php

namespace Gasparik\App\Controller;

use Gasparik\App\DnsFormFactory;
use Gasparik\App\Flash;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;
use Gasparik\Lib\Websupport\WebsupportApi;

class CreateSubmitController implements Controller
{
    private $websupportApi;
    private $formFactory;

    public function __construct(WebsupportApi $websupportApi)
    {
        $this->websupportApi = $websupportApi;
        $this->formFactory = new DnsFormFactory();
    }

    public function execute(Request $request): Response
    {
        $type = $request->getInput('type', '');
        $form = $this->formFactory->createFromType($type);
        $requestData = $request->getInputList();
        $errors = $form->validate($requestData);
        if (!empty($errors)) {
            // todo: store form values in session and then prefill user form with those values
            // todo: store errors in session and show error under corresponding field input
            $errorKey = array_key_first($errors);
            Flash::error($errorKey . ": " .$errors[$errorKey]);
            return Response::redirect('/create?type=' . $type);
        }

        if (isset($requestData['ttl']) && $requestData['ttl'] === '') {
            unset($requestData['ttl']);
        }
        $response = $this->websupportApi->createDnsRecord($requestData);
        if (!isset($response['status']) || $response['status'] !== 'success') {
            // todo: improve error message. Use response error message if it provides some additional information for user
            // todo: add logging
            Flash::error('API does not accept data');
            return Response::redirect('/create?type=' . $type);
        }

        Flash::success('Saved');
        return Response::redirect('/');
    }
}