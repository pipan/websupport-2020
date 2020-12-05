<?php

namespace Gasparik\Lib\Request;

class Request
{
    private $method;
    private $url;
    private $inputs;
    private $headers;

    public function __construct($method, Url $url, $inputs, $headers)
    {
        $this->url = $url;
        $this->method = $method;
        $this->inputs = $inputs;
        $this->headers = $headers;
    }

    public static function fromClient()
    {
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
        $path = strtok($_SERVER["REQUEST_URI"], '?');
        $url = new Url($protocol, $_SERVER['HTTP_HOST'], $path);
        $inputs = $_POST + $_GET;
        return new Request($_SERVER['REQUEST_METHOD'], $url, $inputs, []);
    }

    public function getInput($name, $default = null)
    {
        if (!isset($this->inputs[$name])) {
            return $default;
        }
        return $this->inputs[$name];
    }

    public function getInputList()
    {
        return $this->inputs;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }
}