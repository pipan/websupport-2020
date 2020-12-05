<?php

namespace Gasparik\App;

use Gasparik\App\Form\AModel;
use Gasparik\App\Form\DefaultModel;
use Gasparik\App\Form\FormModel;
use Gasparik\App\Form\MXModel;
use Gasparik\App\Form\SRVModel;

class DnsFormFactory
{
    private $forms;

    public function __construct()
    {
        $this->forms = [
            'A' => new AModel(),
            'AAAA' => new DefaultModel(),
            'MX' => new MXModel(),
            'ANAME' => new DefaultModel(),
            'CNAME' => new DefaultModel(),
            'NS' => new DefaultModel(),
            'TXT' => new DefaultModel(),
            'SRV' => new SRVModel()
        ];
    }

    public function createFromType($type): FormModel
    {
        return $this->forms[$type];
    }
}