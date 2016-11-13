<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/13
 * Time: 15:34
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'Model/test2.php';

$controller = new User();

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello, world");

    return $response;
});

$app->get('/user',function (Request $request, Response $response,$args) use($controller) {
    $user = $controller->showUsers();

    if($user) {
        $response = $response->withStatus(200)->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode(
            [
                'status' => 200,
                'error' => '',
                'datas' => $user
            ]
        ));
    }
    return $response;
});