<?php

namespace Wog\Http;

interface RequestInterface
{

    /**
     * @return string
     */
    public function getMethod(): string;
    /**
     * @return string
     */
    public function getUri(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return array
     */
    public function get(): array;

    /**
     * @return array
     */
    public function post(): array;

    /**
     * @return \stdClass
     */
    public function json(): \stdClass;

}