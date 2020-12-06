<?php

namespace Gasparik\App\Form;

use Gasparik\Lib\Validation\CsrfRule;
use Gasparik\Lib\Validation\RequiredRule;
use Gasparik\Lib\Validation\Validation;

class DefaultModel implements FormModel
{
    public function getSchema()
    {
        return ['type', 'name', 'content', 'ttl'];
    }

    public function validate($data)
    {
        $validator = Validation::make([
            'type' => [ new RequiredRule() ],
            'name' => [ new RequiredRule() ],
            'content' => [ new RequiredRule() ]
        ]);
        return $validator->validate($data);
    }
}
