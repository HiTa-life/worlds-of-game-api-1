<?php

namespace Wog\Http;

abstract class HttpResource implements HttpResourceInterface
{
    use Traits\HeadersAwareTrait;

    public function __construct()
    {
        $this->headers = [];
    }

}