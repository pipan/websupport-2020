<?php

namespace Gasparik\Lib\Client;

use Gasparik\Lib\Client\ServerRequest;

class ServerRequestImmutable implements ServerRequest
{
    private $url;
    private $headers;
    private $method;
    private $body;
    private $auth;

    public function __construct($method, $url, $headers, $body, $auth)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
        $this->auth = $auth;
    }

    public static function build(): ServerRequestImmutable
    {
        return new ServerRequestImmutable("GET", "", [], "", []);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function withMethod($method): ServerRequestImmutable
    {
        return new ServerRequestImmutable($method, $this->url, $this->headers, $this->body, $this->auth);
    }

    public function withUrl($url): ServerRequestImmutable
    {
        return new ServerRequestImmutable($this->method, $url, $this->headers, $this->body, $this->auth);
    }

    public function withHeaders($headers): ServerRequestImmutable
    {
        return new ServerRequestImmutable($this->method, $this->url, $headers, $this->body, $this->auth);
    }

    public function withBody($body): ServerRequestImmutable
    {
        return new ServerRequestImmutable($this->method, $this->url, $this->headers, $body, $this->auth);
    }

    public function withJson($data): ServerRequestImmutable
    {
        return $this->withBody(json_encode($data));
    }

    public function withBasicAuth($user, $password): ServerRequestImmutable
    {
        $auth = [
            'type' => 'Basic',
            'user' => $user,
            'password' => $password
        ];
        return new ServerRequestImmutable($this->method, $this->url, $this->headers, $this->body, $auth);
    }
}