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
require_once 'Model/MessageModel.php';

$friend = new FriendModel();
$message = new MessageModel();

$app->get('/friend',function (Request $request, Response $response,$args) use($friend) {
    return $this->view->render($response, 'friends.php');
});

$app->get('/getfollower',function (Request $request, Response $response,$args) use($friend) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $temp = json_decode($friend->getFollowers($userid),true);
        for($i=0;$i<count($temp);$i++) {
            if($friend->isFriend($userid,$temp[$i]['userid']) == 1) {
                $temp[$i]['isFriend'] = 1;
            } else {
                $temp[$i]['isFriend'] = 0;
            }
        }
        return json_encode($temp);
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/getfollowing',function (Request $request, Response $response,$args) use($friend) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        return $friend->getFollowings($userid);
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->post('/addFriend',function (Request $request, Response $response,$args) use($friend,$message) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $friendid = $_POST['friendid'];
        $result = $friend->addFriend($userid,$friendid);
        if ($result == 1) {
            $info = $_SESSION['user']. '关注了你';
            $message->sendMessage($friendid,$info);
            $response->getBody()->write("<script>alert('关注成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        } else {
            $response->getBody()->write("<script>alert('关注失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->post('/deleteFriend',function (Request $request, Response $response,$args) use($friend) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $friendid = $_POST['friendid'];
        $result = $friend->deleteFriend($userid,$friendid);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('取消关注成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        } else {
            $response->getBody()->write("<script>alert('取消关注失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

