<?php

namespace Wog\Controller\Api;

use Wog\Controller\Controller;
use Wog\Http\RequestInterface;
use Wog\Http\ResponseInterface;
use Wog\Repository\UserRepository;

class LoginController extends Controller implements ApiControllerInterface
{

    /**
     * @inheritDoc
     */
    public function __construct(
        RequestInterface $request,
        ResponseInterface $response)
    {
        parent::__construct($request, $response);
    }

    /**
     * @inheritDoc
     */
    public function retrieve(): ResponseInterface
    {
        try {
            if (!array_key_exists("email", $this->request->get())
                || !array_key_exists("password", $this->request->get())) {
                $this->response->setStatus(422, "Unprocessable Entity");
                $this->response->setError("Missing User parameters");
                return $this->response;
            }
            $repository = new UserRepository();
            $user = $repository->selectByEmail($this->request->get()["email"]);
            if (!password_verify(
                $this->request->get()["password"],
                $user->getPassword())) {
                throw new \TypeError();
            }
            $json = json_decode(json_encode($user));
            $json->token = $user->getToken();
            $this->response->setStatus(200, "Ok");
            $this->response->setBody(json_encode($json));
        } catch (\TypeError $e) {
            $this->response->setStatus(404, "Not Found");
            $this->response->setError("Bad User credentials");
        }
        return $this->response;
    }

    /**
     * @inheritDoc
     */
    public function create(): ResponseInterface
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function update(): ResponseInterface
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(): ResponseInterface
    {
        // TODO: Implement delete() method.
    }
    
}