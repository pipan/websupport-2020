<?php

namespace Gasparik\Lib\Application\Context;

use Gasparik\Lib\Application\Controller;

interface RouterContext
{
    public function addPost($path, Controller $controller);
    public function addGet($path, Controller $controller);
    public function addRoute($method, $path, Controller $controller);
}