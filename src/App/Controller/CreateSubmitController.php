<?php

namespace Gasparik\App\Controller;

use Gasparik\Lib\Application\Controller;
use Gasparik\Lib\Request\Request;

class CreateSubmitController implements Controller
{
    public function execute(Request $request)
    {
        return "create submit";
    }
}