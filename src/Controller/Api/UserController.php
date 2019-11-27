<?php

namespace Wog\Controller\Api;

use Wog\Http\Request;
use Wog\Http\Response;
use Wog\Model\UserModel;
use Wog\Repository\UserRepository;

class UserController
{

    private
        /**
         * @var Request
         */
        $request,
        /**
         * @var Response
         */
        $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(
        Request $request,
        Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function create(): Response
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
                $this->response->setError("User incomplete: missing parameters");
                return $this->response;
            }
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

    public function read(): Response
    {
        $repository = new UserRepository();
        $users = $repository->select();
        $this->response->setBody(json_encode($users));
        return $this->response;
    }

    public function update(): Response
    {
    }

    public function delete(): Response
    {
    }

}