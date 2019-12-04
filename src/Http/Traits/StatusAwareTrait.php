<?php

namespace Wog\Http\Traits;

trait StatusAwareTrait
{

    protected
        /**
         * @var int
         */
        $statusCode,
        /**
         * @var string
         */
        $statusText;

    /**
     * @param int $statusCode
     * @param string $statusText
     */
    public function setStatus(int $statusCode, string $statusText): void
    {
        $this->statusCode = $statusCode;
        $this->statusText = $statusText;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return "$this->statusCode $this->statusText";
    }

}