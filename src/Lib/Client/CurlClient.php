<?php

namespace Gasparik\Lib\Client;

class CurlClient implements Client
{
    public function send(ServerRequest $request)
    {
        $ch = \curl_init();
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        \curl_setopt($ch, CURLOPT_URL, $request->getUrl());
        $curlHeaders = [];
        foreach ($request->getHeaders() as $key => $value) {
            $curlHeaders[] = $key . ": " . $value;
        }
        \curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeaders);
        if ($request->getMethod() === 'POST') {
            \curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getBody());
        }

        $auth = $request->getAuth();
        if (!empty($auth)) {
            if ($auth['type'] === 'Basic') {
                \curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                \curl_setopt($ch, CURLOPT_USERPWD, $auth['user'] . ':' . $auth['password']);
            }
        }

        $response = \curl_exec($ch);
        if (curl_errno($ch)) {
            throw new CurlException(curl_error($ch));
        }

        \curl_close($ch); 
        return $response;
    }
}