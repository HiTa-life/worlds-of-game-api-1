<?php

namespace Wog\Http;

class Response
{

    private
        /**
         * @var int
         */
        $statusCode,
        /**
         * @var string
         */
        $statusText,
        /**
         * @var array
         */
        $headers,
        /**
         * @var string
         */
        $body;

    public function __construct()
    {
        $this->statusCode = 200;
        $this->statusText = "OK";
        $this->headers = [
            "Content-Type" => "application/json"
        ];
        $this->body = "{}";
    }

    /**
     * @param $message
     */
    public function setError($message): void
    {
        $this->setBody(json_encode([
            "code" => $this->statusCode,
            "message" => utf8_encode($message)
        ]));
    }


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

    public function send(): void
    {
        header("HTTP/1.1 " . $this->getStatus());
        foreach ($this->getHeaders() as $key => $value) {
            header("$key: $value");
        }
        echo $this->getBody();
    }

}