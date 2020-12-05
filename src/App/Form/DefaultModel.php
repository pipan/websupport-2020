<?php

namespace Gasparik\App\Form;

class DefaultModel implements FormModel
{
    public function getSchema()
    {
        return ['type', 'name', 'content', 'ttl'];
    }

    public function validate($data)
    {
        return [];
    }
}
