<?php

namespace Gasparik\Lib\Validation;

class CsrfRule implements ValidationRule
{
    public function validate($value, $context)
    {
        $errorMessage = "invalid token";
        if (!isset($_SESSION['csrf'])) {
            return $errorMessage;
        }
        if (!isset($_SESSION['csrf'][$value])) {
            return $errorMessage;
        }

        if ($_SESSION['csrf'][$value] > 0) {
            return $errorMessage;
        }
        return false;
    }
}