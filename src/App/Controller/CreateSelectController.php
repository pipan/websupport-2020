<?php

namespace Gasparik\App\Controller;

use Gasparik\App\View\Layout;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;

class CreateSelectController implements Controller
{
    public function execute(Request $request): Response
    {
        $html = Layout::withBodyFile('createtypes.php')
            ->render([
                'title' => 'DNS | create select type',
                'types' => ['A', 'AAAA', 'MX', 'ANAME', 'CNAME', 'NS', 'TXT', 'SRV']
            ]);
        return Response::html($html);
    }
}
