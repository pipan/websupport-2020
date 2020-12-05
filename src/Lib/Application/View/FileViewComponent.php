<?php

namespace Gasparik\Lib\Application\View;

class FileViewComponent implements ViewComponent
{
    private $filePath;
    
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function render($data)
    {
        ob_start();
        require $this->filePath;
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}