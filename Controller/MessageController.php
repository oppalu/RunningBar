<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'Model/MessageModel.php';

$message = new MessageModel();

$app->get('/showMessage',function (Request $request, Response $response,$args) use($message) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $result = $message->getMyMessages($_SESSION['userid']);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->post('/readMessage',function (Request $request, Response $response, $args) use($message){
    session_start();
    if (isset($_SESSION['userid'])) {
        $data = $request->getParsedBody();
        $id = filter_var($data['messageid'], FILTER_SANITIZE_STRING);
        $result = $message->readMessage($id);
        if($result == 1) {
            $response->getBody()->write("<script>alert('已读!');history.go(-1);</script>");
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});