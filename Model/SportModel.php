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
}