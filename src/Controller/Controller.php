<?php

namespace Wog\Controller;

use Wog\Http\RequestInterface;
use Wog\Http\ResponseInterface;

abstract class Controller
{
    
    protected
        /**
         * @var RequestInterface
         */
        $request,
        /**
         * @var ResponseInterface
         */
        $response;

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     */
    public function __construct(
        RequestInterface $request,
        ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

}