<?php

namespace Gasparik\Lib\Validation;

class SimpleValidator implements Validator
{
    private $rules;

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function validate($data)
    {
        $errors = [];
        foreach ($this->rules as $key => $rule) {
            $error = $rule->validate($data[$key] ?? null, $data);
            if ($error === false) {
                continue;
            }
            $errors[$key] = $error;
        }
        return $errors;
    }
}