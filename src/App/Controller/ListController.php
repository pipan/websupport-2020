<?php

namespace Gasparik\App\Controller;

use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;

class ListController implements Controller
{
    public function execute(Request $request)
    {
        return "list";
    }
}