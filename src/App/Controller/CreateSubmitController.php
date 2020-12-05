<?php

namespace Gasparik\App\Controller;

use Gasparik\App\DnsFormFactory;
use Gasparik\App\Flash;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
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

    public function execute(Request $request)
    {
        $type = $request->getInput('type', '');
        $form = $this->formFactory->createFromType($type);
        $requestData = $request->getInputList();
        $errors = $form->validate($requestData);
        if (!empty($errors)) {
            Flash::error('form is not valid');
            header("location: /create");
            die();
        }

        $response = $this->websupportApi->createDnsRecord($this->domain, $requestData);
        if (!isset($response['status']) || $response['status'] !== 'success') {
            Flash::error('API does not accept data');
            header("location: /create?type=" . $type);
            die();
        }
        var_dump($response);

        Flash::success('Saved');
        header("location: /");
        die();
    }
}