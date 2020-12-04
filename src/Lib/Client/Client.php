<?php

namespace Gasparik\Lib\Client;

interface Client
{
    public function send(ServerRequest $request);
}