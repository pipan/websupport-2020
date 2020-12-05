<?php

namespace Gasparik\App\Form;

class MXModel implements FormModel
{
    public function getSchema()
    {
        return ['type', 'name', 'content', 'ttl', 'prio'];
    }

    public function validate($data)
    {
        // todo: missing validation
        return [];
    }
}
