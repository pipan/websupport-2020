<?php

namespace Gasparik\Lib\Websupport;

use Gasparik\Lib\Client\CurlClient;
use Gasparik\Lib\Client\ServerRequestImmutable;

class WebsupportApi
{
    private $config;
    private $client;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = new CurlClient();
    }

    private function createSignature($method, $path, $time)
    {
        $canonicalRequest = sprintf('%s %s %s', $method, $path, $time);
        return hash_hmac('sha1', $canonicalRequest, $this->config['secret']);
    }

    private function createAuthRequest($method, $path): ServerRequestImmutable
    {
        $time = time();
        $signature = $this->createSignature($method, $path, $time);

        return ServerRequestImmutable::build()
            ->withMethod($method)
            ->withUrl('https://rest.websupport.sk' . $path)
            ->withHeaders([
                'Date' => gmdate('Ymd\THis\Z', $time),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])
            ->withBasicAuth($this->config['key'], $signature);
    }

    public function getDnsList($domain)
    {
        $path = '/v1/user/' . $this->config['user'] . '/zone/' . $domain . '/record';

        $request = $this->createAuthRequest('GET', $path);

        $resonse = $this->client->send($request);
        return json_decode($resonse, true);
    }

    public function createDnsRecord($domain, $record)
    {
        $path = '/v1/user/' . $this->config['user'] . '/zone/' . $domain . '/record';

        $request = $this->createAuthRequest('POST', $path)
            ->withJson($record);

        $resonse = $this->client->send($request);
        return json_decode($resonse, true);
    }

    public function deleteDnsRecord($domain, $recordId)
    {
        $path = '/v1/user/' . $this->config['user'] . '/zone/' . $domain . '/record/' . $recordId;

        $request = $this->createAuthRequest('DELETE', $path);

        $resonse = $this->client->send($request);
        return json_decode($resonse, true);
    }
}