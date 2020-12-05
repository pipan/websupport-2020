<?php

namespace Gasparik\App;

class Flash
{
    public static function push($type, $message)
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
        $_SESSION['flash'][] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public static function success($message)
    {
        Flash::push('success', $message);
    }

    public static function error($message)
    {
        Flash::push('error', $message);
    }

    public static function getAll()
    {
        $result = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']);
        return $result;
    }
}