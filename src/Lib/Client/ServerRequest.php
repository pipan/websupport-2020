<?php

namespace Gasparik\Lib\Client;

interface ServerRequest
{
    public function getMethod();
    public function getUrl();
    public function getHeaders();
    public function getBody();
    public function getAuth();
}