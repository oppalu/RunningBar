<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:10
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'Model/ActivityModel.php';
require_once 'Model/MessageModel.php';

$activity = new ActivityModel();
$message = new MessageModel();

$app->get('/getActivityList',function (Request $request, Response $response,$args) use($activity) {
    return $this->view->render($response, 'activity.php');
});

$app->get('/getActivities',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['userid'])) {
        return $activity->showActivities();
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/activityInfo/{activityid}',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['user'])) {
        $postid = $request->getAttribute('activityid');
        $_SESSION['activityid'] = $postid;
        return $this->view->render($response, 'activity_info.php');
    } else {
        return $this->view->render($response, 'login.php');
    }
});
$app->get('/activity',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['user'])) {
        $temp = json_decode($activity->showActivityInfo($_SESSION['activityid']),true);
        if($activity->isJoin($_SESSION['userid'],$_SESSION['activityid']) == 1) {
            $temp['isJoin'] = 1;
        } else {
            $temp['isJoin'] = 0;
        }

        return json_encode($temp);
    } else {
        return $this->view->render($response, 'login.php');
    }
});
$app->get('/getParcipater',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['user'])) {
        return $activity->getParticipaters($_SESSION['activityid']);
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/addActivity',function (Request $request, Response $response,$args) use($activity) {
    return $this->view->render($response, 'activity_add.php');
});

$app->post('/add',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $data = $request->getParsedBody();
        $name = filter_var($data['activityname'], FILTER_SANITIZE_STRING);
        $userid = $_SESSION['userid'];
        $starttime = filter_var($data['starttime'], FILTER_SANITIZE_STRING);
        $endtime = filter_var($data['endtime'], FILTER_SANITIZE_STRING);
        $goal = filter_var($data['goal'], FILTER_SANITIZE_STRING);
        $type = filter_var($data['type'], FILTER_SANITIZE_STRING);
        $introduction = filter_var($data['introduction'], FILTER_SANITIZE_STRING);
        $result = $activity->addActivity($name,$userid,$starttime,$endtime,$goal,$type,$introduction);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('发布成功!');history.go(-1);</script>");
        } else {
            $response->getBody()->write("<script>alert('发布失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/join',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $result = $activity->participate($_SESSION['userid'],$_SESSION['activityid']);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('加入成功!');history.go(-1);</script>");
        } else {
            $response->getBody()->write("<script>alert('加入失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/quit',function (Request $request, Response $response,$args) use($activity) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $result = $activity->quit($_SESSION['userid'],$_SESSION['activityid']);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('退出成功!');history.go(-1);</script>");
        } else {
            $response->getBody()->write("<script>alert('退出失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});