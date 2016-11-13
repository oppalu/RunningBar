<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'Model/UserModel.php';

$user = new UserModel();

$app->post('/register',function (Request $request, Response $response, $args) use($user){
    $data = $request->getParsedBody();
    $phone = filter_var($data['phone'], FILTER_SANITIZE_STRING);
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $result = $user->register($username,$phone,$password);
    if($result == 1) {
        session_start();
        $_SESSION['user'] = $username;
        $response->getBody()->write("<script>alert('注册成功!');</script>");
        return $this->view->render($response,'sportdata.php');
    } else {
        $response->getBody()->write("<script>alert('该用户信息已存在!'); history.go(-1);</script>");
        return $response;
    }
});

$app->post('/login',function (Request $request, Response $response, $args) use($user){
    $data = $request->getParsedBody();
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $result = $user->login($username,$password);
    if($result == 1) {
        session_start();
        $_SESSION['user'] = $username;
        $response->getBody()->write("<script>alert('登录成功!');</script>");
        return $this->view->render($response,'sportdata.php');
    } else {
        $response->getBody()->write("<script>alert('用户名或密码错误!');history.go(-1); </script>");
        return $response;
    }
});

$app->get('/test',function (Request $request, Response $response,$args) use($user) {
    $result = $user->showUsers();

    if($result) {
        $response = $response->withStatus(200)->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode(
            $result
        ));
    }
    return $response;
});