<?php

namespace Gasparik\App\Form;

class SRVModel implements FormModel
{
    public function getSchema()
    {
        return ['type', 'name', 'content', 'ttl', 'prio', 'port', 'weight'];
    }

    public function validate($data)
    {
        // todo: missing validation
        return [];
    }
}
