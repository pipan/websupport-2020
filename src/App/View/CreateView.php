<?php

namespace Gasparik\App\View;

use Gasparik\Lib\Application\View\FileViewComponent;

class CreateView
{
    private $layout;
    private $body;

    public function __construct()
    {
        $this->layout = new FileViewComponent(__DIR__ . '/layout.php');
        $this->body = new FileViewComponent(__DIR__ . '/create.php');
    }

    public function render($data)
    {
        $bodyHtml = $this->body->render($data);
        return $this->layout->render([
            'body' => $bodyHtml
        ] + $data);
    }
}