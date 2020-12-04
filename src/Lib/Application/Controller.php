<?php

namespace Gasparik\Lib\Application;

use Gasparik\Lib\Request\Request;

interface Controller
{
    public function execute(Request $request);
}