<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:10
 */
require_once "MyDB.php";

class SportModel {

    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function showTodayWalk($userid) {
        $date = date('Y-m-d',time());
        return MyDB::select(
            'sport',
            array(
                'sum(distance) AS todaywalk'
            ),
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'type'=>'walk'
                ),
                'whereother'=>'createtime LIKE \''. $date. '%\'',
                'single'=>'true'
            )
        );
    }

    function showTodayRun($userid) {
        $date = date('Y-m-d',time());
        return MyDB::select(
            'sport',
            array(
                'sum(distance) AS todayrun'
            ),
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'type'=>'run'
                ),
                'whereother'=>'createtime LIKE \''. $date. '%\'',
                'single'=>'true'
            )
        );
    }

    function showTotalWalk($userid) {
        return MyDB::select(
            'sport',
            array(
                'sum(distance) AS totalwalk'
            ),
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'type'=>'walk'
                ),
                'single'=>'true'
            )
        );
    }

    function showTotalRun($userid) {
        return MyDB::select(
            'sport',
            array(
                'sum(distance) AS totalrun'
            ),
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'type'=>'run'
                ),
                'single'=>'true'
            )
        );
    }

    function registertime($userid) {
        $data = MyDB::select(
            'user',
            'date(registertime)',
            array(
                'where'=>array(
                    'userid'=>$userid
                ),
                'single'=>'true'
            )
        );
        $temp = json_decode($data,true)['date(registertime)'];
        $today = date('Y-m-d',time());
        return floor((strtotime($today)-strtotime($temp))/86400);
    }

    function walkrank($userid) {
        $data = MyDB::select(
            'sport,follower',
            'sport.userid,sum(distance) AS walk',
            array(
                'where'=>array(
                    'follower.fanid'=>$userid,
                    'type'=>'walk'
                ),
                'whereother'=>'sport.userid=follower.userid',
                'groupby'=>'sport.userid',
                'orderby'=>'sum(distance) DESC'
            )
        );

        $temp = json_decode($data,true);
        $my = $this->getSingleWalk($userid);
        array_push($temp,$my);
        return json_encode($temp);
    }

    function runrank($userid) {
        $data = MyDB::select(
            'sport,follower',
            'sport.userid,sum(distance) as run',
            array(
                'where'=>array(
                    'follower.fanid'=>$userid,
                    'type'=>'run'
                ),
                'whereother'=>'sport.userid=follower.userid',
                'groupby'=>'sport.userid',
                'orderby'=>'sum(distance) DESC'
            )
        );
        $temp = json_decode($data,true);
        $my = $this->getSingleRun($userid);
        array_push($temp,$my);
        return json_encode($temp);
    }

    function getSingleWalk($userid) {
        $data = MyDB::select(
            'sport',
            'sum(distance)',
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'type'=>'walk'
                ),
                'single'=>'true'
            )
        );
        $result=array();
        $result['userid'] = $userid;
        $result['walk'] = json_decode($data,true)['sum(distance)'];
        return $result;
    }

    function getSingleRun($userid) {
        $data = MyDB::select(
            'sport',
            'sum(distance)',
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'type'=>'run'
                ),
                'single'=>'true'
            )
        );
        $result=array();
        $result['userid'] = $userid;
        $result['run'] = json_decode($data,true)['sum(distance)'];
        return $result;
    }

    function getFriendNum($userid) {
        return MyDB::select(
            'follower',
            'count(*) as friendnum',
            array(
                'where'=>array(
                    'fanid'=>$userid
                ),
                'single'=>'true'
            )
        );
    }

    function analyse($userid) {
        $data = MyDB::select(
            'sport',
            'sum(calorie) as calories',
            array(
                'where'=>array(
                    'userid'=>$userid
                ),
                'single'=>'true'
            )
        );
        $temp = json_decode($data,true);
        $temp['analyse']=$this->calculate($temp['calories']) ;
        return json_encode($temp);
    }

    function calculate($calorie) {
        $fat = number_format(($calorie/7700.0),2,'.','');
        $food = round($calorie/250.0);
        return '燃烧了'.$fat.'公斤脂肪,少吃了'.$food.'个肉包子';
    }

    function getUsername($userid) {
        $date = MyDB::select(
            'user',
            'username',
            array(
                'where'=>array(
                    'userid'=>$userid
                ),
                'single'=>'true'
            )
        );
        return json_decode($date,true)['username'];
    }
}