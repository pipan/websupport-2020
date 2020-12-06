<?php

namespace Gasparik\Lib\Validation;

class Validation
{
    public static function make($rules): Validator
    {
        $wrappedRules = [];
        foreach ($rules as $key => $ruleArray) {
            $wrappedRules[$key] = new ChainBailRule($ruleArray);
        }
        return new SimpleValidator($wrappedRules);
    }

    public static function makeWithCsrf($rules): Validator
    {
        $rules['csrf'] = [
            new RequiredRule(),
            new CsrfRule()
        ];
        $wrappedRules = [];
        foreach ($rules as $key => $ruleArray) {
            $wrappedRules[$key] = new ChainBailRule($ruleArray);
        }
        return new SimpleValidator($wrappedRules);
    }
}