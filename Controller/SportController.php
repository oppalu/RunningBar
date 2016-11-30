<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'Model/SportModel.php';

$sport = SportModel::getInstance();

$app->get('/statistics',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    $userid = $_SESSION['userid'];
    $temp = json_decode($sport->showTodayRun($userid),true);
    $temp['todaywalk'] = json_decode($sport->showTodayWalk($userid),true)['todaywalk'];
    $temp['totalrun'] = json_decode($sport->showTotalRun($userid),true)['totalrun'];
    $temp['totalwalk'] = json_decode($sport->showTotalWalk($userid),true)['totalwalk'];
    $temp['registerday'] = $sport->registertime($userid);

    return json_encode($temp);
});

$app->get('/sportinfo/{userid}',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    $postid = $request->getAttribute('userid');
    $_SESSION['sportuserid'] = $postid;
    return $this->view->render($response, 'friendinfo.php');
});

$app->get('/getsport',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    $userid = $_SESSION['userid'];
    $temp = json_decode($sport->showTodayRun($userid),true);
    $temp['todaywalk'] = json_decode($sport->showTodayWalk($userid),true)['todaywalk'];
    $temp['totalrun'] = json_decode($sport->showTotalRun($userid),true)['totalrun'];
    $temp['totalwalk'] = json_decode($sport->showTotalWalk($userid),true)['totalwalk'];
    $temp['registerday'] = $sport->registertime($userid);
    $temp2 = json_decode($sport->analyse($userid),true);
    $temp['calories'] = $temp2['calories'];
    $temp['analyse'] = $temp2['analyse'];

    return json_encode($temp);
});

$app->get('/getfsport',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    $userid = $_SESSION['sportuserid'];
    $temp = json_decode($sport->showTodayRun($userid),true);
    $temp['todaywalk'] = json_decode($sport->showTodayWalk($userid),true)['todaywalk'];
    $temp['totalrun'] = json_decode($sport->showTotalRun($userid),true)['totalrun'];
    $temp['totalwalk'] = json_decode($sport->showTotalWalk($userid),true)['totalwalk'];
    $temp['registerday'] = $sport->registertime($userid);
    $temp2 = json_decode($sport->analyse($userid),true);
    $temp['calories'] = $temp2['calories'];
    $temp['analyse'] = $temp2['analyse'];

    return json_encode($temp);
});

$app->get('/analyse',function (Request $request, Response $response,$args) use($sport) {
    return $this->view->render($response, 'analyse.php');
});

$app->get('/getRank',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    $userid = $_SESSION['userid'];
    $temp = json_decode($sport->getFriendNum($userid),true);

    $temp1 = json_decode($sport->walkrank($userid),true);
    $walkrank = 0;
    $mywalk = $temp1[count($temp1)-1]['walk'];
    for($i=0;$i<count($temp1)-1;$i++) {
        if($temp1[$i]['walk'] <$mywalk) {
            $walkrank = $i+1;
            break;
        }
    }
    $temp['walkrank'] = $walkrank;

    $temp1 = json_decode($sport->runrank($userid),true);
    $mywalk = $temp1[count($temp1)-1]['run'];
    for($i=0;$i<count($temp1);$i++) {
        if($temp1[$i]['run'] <$mywalk) {
            $walkrank = $i+1;
            break;
        }
    }
    $temp['runrank'] = $walkrank;
    return json_encode($temp);
});

$app->get('/rankChart',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    $userid = $_SESSION['userid'];
    $temp = json_decode($sport->walkrank($userid),true);
    $result = array();
    $result['username'] = array();
    $result['walk'] = array();
    $result['run'] = array();

    for($i=0;$i<count($temp);$i++) {
        $result['username'][] = $sport->getUsername($temp[$i]['userid']);
        $result['walk'][] = $temp[$i]['walk'];
        $result['run'][] = $sport->getSingleRun($temp[$i]['userid'])['run'];
    }
    return json_encode($result);
});

$app->get('/weekChart',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    return $sport->getWeekData($_SESSION['userid']);
});

$app->get('/monthChart',function (Request $request, Response $response,$args) use($sport) {
    session_start();
    return $sport->getMonthData($_SESSION['userid']);
});