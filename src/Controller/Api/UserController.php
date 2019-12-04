<?php

namespace Wog\Controller\Api;

use Wog\Controller\Controller;
use Wog\Http\RequestInterface;
use Wog\Http\ResponseInterface;
use Wog\Model\UserModel;
use Wog\Repository\UserRepository;

class UserController extends Controller implements ApiControllerInterface
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
    public function create(): ResponseInterface
    {
        try {
            $user = new UserModel($this->request->json());
            if (!$user->getAdress()
                || !$user->getCity()
                || !$user->getEmail()
                || !$user->getFirstName()
                || !$user->getLastName()
                || !$user->getPassword()
                || !$user->getPhone()
                || !$user->getSurname()
                || !$user->getZip()) {
                $this->response->setStatus(422, "Unprocessable Entity");
                $this->response->setError("Missing User parameters");
                return $this->response;
            }
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $user->setToken(md5($user->getPassword()));
            $repository = new UserRepository();
            $repository->insert($user);
            $this->response->setStatus(201, "Created");
            $this->response->setBody(json_encode($user));
        } catch (\PDOException $exc) {
            if ("23000" !== $exc->getCode()) {
                throw $exc;
            }
            $this->response->setStatus(409, "Conflict");
            $this->response->setError("User already exists");
        }
        return $this->response;
    }

    /**
     * @inheritDoc
     */
    public function update(): ResponseInterface
    {
        // TODO: Implement retrieve() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(): ResponseInterface
    {
        // TODO: Implement retrieve() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieve(): ResponseInterface
    {
        $repository = new UserRepository();
        $users = $repository->select();
        $this->response->setBody(json_encode($users));
        return $this->response;
    }

}