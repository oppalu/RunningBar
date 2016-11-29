<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'Model/SportModel.php';
$sport = new SportModel();

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
    $userid = $_SESSION['sportuserid'];
    $temp = json_decode($sport->showTodayRun($userid),true);
    $temp['todaywalk'] = json_decode($sport->showTodayWalk($userid),true)['todaywalk'];
    $temp['totalrun'] = json_decode($sport->showTotalRun($userid),true)['totalrun'];
    $temp['totalwalk'] = json_decode($sport->showTotalWalk($userid),true)['totalwalk'];
    $temp['registerday'] = $sport->registertime($userid);

    return json_encode($temp);
});
