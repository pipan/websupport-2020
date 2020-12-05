<?php

namespace Gasparik\Lib\Adapter;

class ChainBailAdapter implements Adapter
{
    private $adapters;

    public function __construct($adapters)
    {
        $this->adapters = $adapters;
    }

    public function adapt($item)
    {
        foreach ($this->adapters as $adapter) {
            $result = $adapter->adapt($item);
            if (!$result) {
                continue;
            }
            return $result;
        }
        return null;
    }
}