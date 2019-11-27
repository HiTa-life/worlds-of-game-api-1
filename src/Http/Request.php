<?php

namespace Wog\Http;

class Request
{

    private
        /**
         * @var string
         */
        $method,
        /**
         * @var string
         */
        $uri,
        /**
         * @var array
         */
        $headers,
        /**
         * @var array
         */
        $get,
        /**
         * @var array
         */
        $post,
        /**
         * @var \stdClass
         */
        $json;

    public function __construct()
    {
        $this->method = strtolower($_SERVER["REQUEST_METHOD"]);
        $this->uri = explode("?", $_SERVER["REQUEST_URI"])[0];
        $this->headers = [];
        foreach ($_SERVER as $key => $value) {
            $keys = explode("_", $key);
            if ("HTTP" !== $keys[0]) {
                continue;
            }
            array_shift($keys);
            foreach ($keys as $subKey => $subValue) {
                $keys[$subKey] = ucfirst(strtolower($subValue));
            }
            $this->headers[implode("-", $keys)] = $value;
        }
        $this->get = $_GET;
        $this->post = $_POST;
        $this->json = json_decode(stream_get_contents(fopen("php://input", "r")));
        if (null === $this->json) {
            $this->json = new \stdClass();
        }
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function post(): array
    {
        return $this->post;
    }

    /**
     * @return \stdClass
     */
    public function json(): \stdClass
    {
        return $this->json;
    }

}