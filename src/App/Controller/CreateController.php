<?php

namespace Gasparik\App\Controller;

use Gasparik\App\DnsFormFactory;
use Gasparik\App\Flash;
use Gasparik\App\View\CreateView;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;

class CreateController implements Controller
{
    private $formFactory;

    public function __construct()
    {
        $this->formFactory = new DnsFormFactory();
    }

    public function execute(Request $request): Response
    {
        $type = $request->getInput('type', '');
        $model = $this->formFactory->createFromType($type);

        $formSchema = $model->getSchema();
        $form = [];
        foreach ($formSchema as $value) {
            $form[$value] = $request->getInput($value, ''); // this is a good place to fill in any default values or value after invalid form submit
        }

        $html = (new CreateView())
            ->render([
                'title' => 'DNS | create',
                'form' => $form,
                'flash' => Flash::getAll()
            ]);
        return Response::html($html);
    }
}
