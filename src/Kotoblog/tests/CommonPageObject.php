<?php

namespace Kotoblog\tests;

use Guzzle\Http\Message\Response as GuzzleResponse;
use Guzzle\Http\Client;

class CommonPageObject
{
    /** @var  GuzzleResponse */
    protected $guzzleResponse;

    public function __construct($uri, $method = 'GET')
    {
        $client = new Client(HTTP_HOST);

        $request = $client->{strtolower($method)}($uri);
        $guzzleResponse = $request->send();

        $this->guzzleResponse = $guzzleResponse;
    }

    public function hasHeaderValue($headerName, $value)
    {
        return $this->guzzleResponse->getHeader($headerName)->hasValue($value);
    }

    public function hasHeader($headerName)
    {
        return $this->guzzleResponse->getHeader($headerName) ? true : false;
    }

    public function isBodyIsJson() {
        json_decode($this->guzzleResponse->getBody());

        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function getStatusCode()
    {
        return $this->guzzleResponse->getStatusCode();
    }
}
