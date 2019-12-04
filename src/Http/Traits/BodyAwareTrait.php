<?php

namespace Wog\Http\Traits;

trait BodyAwareTrait
{

    protected
        /**
         * @var string
         */
        $body;

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

}