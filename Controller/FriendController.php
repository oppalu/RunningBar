<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'Model/FriendModel.php';

$friend = new FriendModel();

$app->get('/friend',function (Request $request, Response $response,$args) use($friend) {
    return $this->view->render($response, 'friends.php');
});

$app->get('/getfollower',function (Request $request, Response $response,$args) use($friend) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $result = $friend->getFollowers($userid);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/getfollowing',function (Request $request, Response $response,$args) use($friend) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $result = $friend->getFollowings($userid);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }
});

