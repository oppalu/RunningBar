<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/7
 * Time: 09:43
 */

require 'vendor/autoload.php';

$app = new \Slim\App();

require 'Controller/test.php';

//$app->get('/',function (Request $request, Response $response) {
//    return $this->view->render($response,'home.php');
//});
//
//$container = $app->getContainer();
//$container['view'] = function () {
//    return new \Slim\Views\PhpRenderer('View');
//};
//
//require 'Routes/UserRoute.php';

$app->run();