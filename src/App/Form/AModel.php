<?php

namespace Gasparik\App\Form;

use Gasparik\Lib\Validation\CsrfRule;
use Gasparik\Lib\Validation\PatternRule;
use Gasparik\Lib\Validation\RequiredRule;
use Gasparik\Lib\Validation\Validation;

class AModel extends DefaultModel
{
    public function validate($data)
    {
        $validator = Validation::makeWithCsrf([
            'type' => [ new RequiredRule() ],
            'name' => [ new RequiredRule() ],
            'content' => [
                new RequiredRule(),
                new PatternRule('~^([0-9]{1,3}\.){3}[0-9]{1,3}$~', 'Has to be valid IP address') // this is not a correct rule for validating IP address. This regular expresion will allow strings such as "999.999.999.999". It's just an example how one could use this validator to validate input.
            ]
        ]);
        return $validator->validate($data);
    }
}
