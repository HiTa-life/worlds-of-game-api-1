<?php

use Wog\Http\Request;
use Wog\Http\Response;

require "./../vendor/autoload.php";

$response = new Response();
$request = new Request();

try {
    if ("options" === $request->getMethod()) {
        $response->setStatus(200, "OK");
        throw new OutOfRangeException();
    }
    $routes = json_decode(file_get_contents("../config/routes.json"));
    foreach ($routes as $primary) {
        if (!preg_match("#^$primary->path$#", $request->getUri())) {
            continue;
        }
        foreach ($routes as $secondary) {
            if ($secondary->path === $primary->path && $request->getMethod() === $secondary->method) {
                $response = (new $secondary->controller($request, $response))->{$secondary->action}();
                throw new LogicException();
            }
        }
        $response->setStatus(405, "Method Not Allowed");
        $response->setError("Method: " . $request->getMethod() . " Not Allowed");
        throw new LogicException();
    }
    $response->setStatus(404, "Not Found");
    $response->setError("Uri: " . $request->getUri() . " Not Found");
} catch (OutOfRangeException $exc) {
} catch (LogicException $exc) {
    unset($routes);
} catch (Throwable $exc) {
    $response->setStatus(500, "Internal Server Error");
    $response->setError($exc->getMessage() . "(" . $exc->getFile() . "[" . $exc->getLine() . "])");
}

unset($request);
$response->send();