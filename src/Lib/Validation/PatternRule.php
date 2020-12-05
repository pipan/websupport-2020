<?php

namespace Gasparik\Lib\Validation;

class PatternRule implements ValidationRule
{
    private $regexp;
    private $errorMessage;

    public function __construct($regexp, $errorMessage)
    {
        $this->regexp = $regexp;
        $this->errorMessage = $errorMessage;
    }

    public function validate($value, $context)
    {
        if (preg_match($this->regexp, $value) !== 1) {
            return $this->errorMessage;
        }
        return false;
    }
}