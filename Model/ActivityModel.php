<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:09
 */
require_once "MyDB.php";

class ActivityModel {

    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function addActivity($name,$userid,$starttime,$endtime,$goal,$type,$introduction) {
        return MyDB::insert(
            'activity',
            array(
                'name'=>$name,
                'createuser'=>$userid,
                'starttime'=>$starttime,
                'endtime'=>$endtime,
                'goal'=>$goal,
                'type'=>$type,
                'introduction'=>$introduction,
                'state'=>'审核中'
            )
        );
    }

    function reviewActivity($id) {
        return MyDB::update(
            'activity',
            array(
                'state'=>'进行中'
            ),
            array(
                'id'=>$id
            )
        );
    }

    function offdate() {
        $date = date('Y-m-d',time());
        $temp = ' endtime <'. $date;
        return MyDB::update(
            'activity',
            array(
                'state'=>'已结束'
            ),
            array(
                'whereother'=>$temp
            )
        );
    }

    function showActivities() {
        $date = date('Y-m-d',time());
        $temp = ' endtime >='. $date;
        return MyDB::select(
            'activity',
            '*',
            array(
                'where'=>array(
                    'state'=>'进行中'
                ),
                'whereother'=>$temp
            )
        );
    }

    function getUserActivities($userid) {
        return MyDB::select(
            'activity',
            '*',
            array(
                'where'=>array(
                    'createuser'=>$userid
                )
            )
        );
    }

    function showActivityInfo($id) {
        return MyDB::select(
            'activity',
            '*',
            array(
                'where'=>array(
                    'id'=>$id
                ),
                'single'=>'true'
            )
        );
    }

    function deleteActivity($id) {
        return MyDB::delete(
            'activity',
            array(
                'id'=>$id
            )
        );
    }

    function getParticipate($userid) {
        return MyDB::select(
            'activity,participater',
            '*',
            array(
                'where'=>array(
                    'userid'=>$userid
                ),
                'whereother'=>'id=activityid'
            )
        );
    }

    function getParticipaters($acid) {
        return MyDB::select(
            'user,participater',
            '*',
            array(
                'where'=>array(
                    'activityid'=>$acid
                ),
                'whereother'=>'participater.userid=user.userid',
                'orderby'=>'finish DESC'
            )
        );
    }

    function participate($userid,$activityid) {
        return MyDB::insert(
            'participater',
            array(
                'activityid'=>$activityid,
                'userid'=>$userid,
                'finish'=>0
            )
        );
    }

    function quit($userid,$activityid) {
        return MyDB::delete(
            'participater',
            array(
                'activityid'=>$activityid,
                'userid'=>$userid
            )
        );
    }

    function isJoin($userid,$activityid) {
        $result = MyDB::select(
            'participater',
            '*',
            array(
                'where'=>array(
                    'userid'=>$userid,
                    'activityid'=>$activityid
                )
            )
        );
        $array = json_decode($result);
        if(count($array) == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}