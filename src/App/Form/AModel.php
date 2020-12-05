<?php

namespace Gasparik\App\Form;

use Gasparik\Lib\Validation\PatternRule;
use Gasparik\Lib\Validation\RequiredRule;
use Gasparik\Lib\Validation\Validation;

class AModel extends DefaultModel
{
    public function validate($data)
    {
        $validator = Validation::make([
            'type' => [ new RequiredRule() ],
            'name' => [ new RequiredRule() ],
            'content' => [
                new RequiredRule(),
                new PatternRule('~^([0-9]{1,3}\.){3}[0-9]{1,3}$~', 'Has to be valid IP address')
            ]
        ]);
        return $validator->validate($data);
    }
}
