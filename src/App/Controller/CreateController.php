<?php

namespace Gasparik\App\Controller;

use Gasparik\App\Csrf;
use Gasparik\App\DnsFormFactory;
use Gasparik\App\Flash;
use Gasparik\App\View\Layout;
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
            // todo: set value for a form if there is some in session for this field (for example in case of validation error)
            $form[$value] = $request->getInput($value, '');
        }

        $html = Layout::withBodyFile('create.php')
            ->render([
                'title' => 'DNS | create',
                'form' => $form,
                'flash' => Flash::getAll(),
                'csrf_token' => Csrf::generate()
            ]);
        return Response::html($html);
    }
}
