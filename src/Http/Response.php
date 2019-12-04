<?php

namespace Wog\Http;

class Response extends HttpResource implements ResponseInterface
{

    use Traits\StatusAwareTrait;
    use Traits\BodyAwareTrait;
    use Traits\SenderTrait;

    public function __construct()
    {
        parent::__construct();
        $this->statusCode = 200;
        $this->statusText = "OK";
        $this->headers = [
            "Content-Type" => "application/json",
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Allow-Methods" => "GET,POST,PUT,DELETE,OPTIONS",
            "Access-Control-Allow-Headers" => "Content-Type",
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

}