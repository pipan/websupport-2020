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
    private $domain;
    private $websupportApi;
    private $formFactory;

    public function __construct($config)
    {
        $this->domain = $config['websupport']['domain'];
        $this->websupportApi = new WebsupportApi($config['websupport']);
        $this->formFactory = new DnsFormFactory();
    }

    public function execute(Request $request): Response
    {
        $type = $request->getInput('type', '');
        $form = $this->formFactory->createFromType($type);
        $requestData = $request->getInputList();
        $errors = $form->validate($requestData);
        if (!empty($errors)) {
            $errorKey = array_key_first($errors);
            Flash::error($errorKey . ": " .$errors[$errorKey]);
            return Response::redirect('/create?type=' . $type);
        }

        if (isset($requestData['ttl']) && $requestData['ttl'] === '') {
            unset($requestData['ttl']);
        }
        $response = $this->websupportApi->createDnsRecord($this->domain, $requestData);
        if (!isset($response['status']) || $response['status'] !== 'success') {
            Flash::error('API does not accept data');
            return Response::redirect('/create?type=' . $type);
        }

        Flash::success('Saved');
        return Response::redirect('/');
    }
}