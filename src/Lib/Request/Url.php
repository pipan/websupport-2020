<?php

namespace Gasparik\Lib\Request;

class Url
{
    private $protocol;
    private $host;
    private $path;

    public function __construct($protocol, $host, $path)
    {
        $this->protocol = $protocol;
        $this->host = $host;
        $this->path = $path;
    }

    public function getFull()
    {
        return $this->protocol . "://" . $this->host . $this->path;
    }

    public function getPath()
    {
        return $this->path;
    }
}