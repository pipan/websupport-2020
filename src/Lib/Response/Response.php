<?php

namespace Gasparik\Lib\Response;

class Response
{
    private $status;
    private $context;

    public function __construct($status, $context)
    {
        $this->status = $status;
        $this->context = $context;
    }

    public static function html($body, $status = 200)
    {
        return new Response($status, [
            'body' => $body
        ]);
    }

    public static function redirect($location, $status = 302)
    {
        return new Response($status, [
            'location' => $location
        ]);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getContext($key)
    {
        return $this->context[$key] ?? '';
    }
}