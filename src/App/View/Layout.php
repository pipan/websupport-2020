<?php

namespace Gasparik\App\View;

use Gasparik\Lib\Application\View\FileViewComponent;
use Gasparik\Lib\Application\View\ViewComponent;

class Layout
{
    private $layout;
    private $body;

    public function __construct(ViewComponent $bodyView)
    {
        $this->layout = new FileViewComponent(__DIR__ . '/layout.php');
        $this->body = $bodyView;
    }

    public static function withBodyFile($bodyFile)
    {
        return new Layout(new FileViewComponent(__DIR__ . DIRECTORY_SEPARATOR . $bodyFile));
    }

    public function render($data)
    {
        $bodyHtml = $this->body->render($data);
        return $this->layout->render([
            'body' => $bodyHtml
        ] + $data);
    }
}