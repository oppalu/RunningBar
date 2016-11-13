<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/7
 * Time: 09:43
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App();

$app->get('/',function (Request $request, Response $response) {
    return $this->view->render($response,'index.php');
});

$container = $app->getContainer();
$container['view'] = function () {
    return new \Slim\Views\PhpRenderer('View');
};

$app->run();