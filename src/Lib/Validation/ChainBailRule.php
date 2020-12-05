<?php

namespace Gasparik\Lib\Validation;

class ChainBailRule implements ValidationRule
{
    private $rules;

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function validate($value, $context)
    {
        foreach ($this->rules as $rule) {
            $result = $rule->validate($value, $context);
            if ($result === false) {
                continue;
            }
            return $result;
        }
        return false;
    }
}