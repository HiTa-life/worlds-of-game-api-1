<?php

namespace Wog\Http\Traits;

trait HeadersAwareTrait
{
    protected
        /**
         * @var array
         */
        $headers;

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

}