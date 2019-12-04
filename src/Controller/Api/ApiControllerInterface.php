<?php

namespace Wog\Controller\Api;

use Wog\Http\ResponseInterface;

interface ApiControllerInterface
{

    /**
     * Triggered for GET HTTP method
     *
     * Responsible to query a model and put it in the response body
     * Must retrieve 200 response for found resource
     * Must retrieve 404 response for not found resource
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo throwable
     */
    public function retrieve(): ResponseInterface;

    /**
     * Triggered for POST HTTP method
     *
     * Responsible to query a model and put it in the response body
     * Must retrieve 201 response for created resource
     * Must retrieve 409 response for conflict
     * Must retrieve 422 response for unprocessable entity
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo throwable except constraint integrity violation
     */
    public function create(): ResponseInterface;

    /**
     * Triggered for PUT HTTP method
     *
     * Responsible to query a model and put it in the response body
     * Must retrieve 200 response for updated resource
     * Must retrieve 409 response for conflict
     * Must retrieve 422 response for unprocessable entity
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo throwable except constraint integrity violation
     */
    public function update(): ResponseInterface;

    /**
     * Triggered for DELETE HTTP method
     *
     * Responsible to query a model and put it in the response body
     * Must retrieve 200 response for deleted resource
     * Must retrieve 404 response for not found resource
     *
     * @return ResponseInterface
     *
     * @throws \PDOException for all pdo throwable
     */
    public function delete(): ResponseInterface;

}