<?php

namespace Gasparik\App\Form;

interface FormModel
{
    public function getSchema();
    public function validate($data);
}
