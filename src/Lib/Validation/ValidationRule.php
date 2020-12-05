<?php

namespace Gasparik\Lib\Validation;

interface ValidationRule
{
    public function validate($value, $context);
}