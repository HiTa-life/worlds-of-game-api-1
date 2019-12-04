<?php

namespace Wog\Http;

interface ResponseInterface
{

    /**
     * @param $message
     */
    public function setError($message): void;

    /**
     * @param int $statusCode
     * @param string $statusText
     */
    public function setStatus(int $statusCode, string $statusText): void;

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @param string $body
     */
    public function setBody(string $body): void;

    /**
     * Must send protocol, headers and body
     */
    public function send(): void;

}