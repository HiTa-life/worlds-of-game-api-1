<?php

use Wog\Http\Request;
use Wog\Http\Response;
use Wog\Controller\Api\UserController;

require "./../vendor/autoload.php";

try {
    $response = new Response();
    $request = new Request();
    if ("/users" === $request->getUri()) {
        $controller = new UserController($request, $response);
        if ("get" === $request->getMethod()) {
            $response = $controller->read();
        } elseif ("post" === $request->getMethod()) {
            $response = $controller->create();
        } else {
            $response->setStatus(405, "Method Not Allowed");
            $response->setError("The method: " . $request->getMethod() . " is Not Allowed");
        }
    } else {
        $response->setStatus(404, "Not Found");
        $response->setError("The URI: " . $request->getUri() . " is Not Found");
    }
} catch (Throwable $exc) {
    $response->setStatus(500, "Internal Server Error");
    $response->setError($exc->getMessage() . "(" . $exc->getFile() . "[" . $exc->getLine() . "])");
}

$response->send();