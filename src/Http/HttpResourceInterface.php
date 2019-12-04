<?php

namespace Wog\Http;

interface HttpResourceInterface
{
    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void;

}