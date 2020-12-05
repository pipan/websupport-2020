<?php

namespace Gasparik\Lib\Application;

use Gasparik\Lib\Request\Request;
use Gasparik\Lib\Response\Response;

interface Controller
{
    public function execute(Request $request): Response;
}