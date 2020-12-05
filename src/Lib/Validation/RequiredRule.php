<?php

namespace Gasparik\Lib\Validation;

class RequiredRule implements ValidationRule
{
    public function validate($value, $context)
    {
        if ($value === null || $value === '') {
            return "required";
        }
        return false;
    }
}