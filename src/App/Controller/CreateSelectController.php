<?php

namespace Gasparik\App\Controller;

use Gasparik\App\View\CreateTypeSelectView;
use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;

class CreateSelectController implements Controller
{
    public function execute(Request $request)
    {
        return (new CreateTypeSelectView())
            ->render([
                'title' => 'DNS | create select type',
                'types' => ['A', 'AAAA', 'MX', 'ANAME', 'CNAME', 'NS', 'TXT', 'SRV']
            ]);
    }
}
