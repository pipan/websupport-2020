<?php

namespace Gasparik\App;

class Csrf
{
    public static function generate()
    {
        $token = bin2hex(random_bytes(16));
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = [];
        }
        $_SESSION['csrf'][$token] = 0;
        return $token;
    }
}