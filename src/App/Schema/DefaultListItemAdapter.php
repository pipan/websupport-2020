<?php

namespace Gasparik\App\Schema;

use Gasparik\App\Csrf;
use Gasparik\Lib\Adapter\Adapter;

class DefaultListItemAdapter implements Adapter
{
    private $domain;

    public function __construct($domain)
    {
        $this->domain = $domain;
    }
    public function adapt($item)
    {
        return [
            'id' => $item['id'],
            'type' => $item['type'],
            'name' => $item['name'] . "." . $this->domain,
            'note' => $item['content'],
            'csrf_token' => Csrf::generate()
        ];
    }
}