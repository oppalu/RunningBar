<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:09
 */
require_once 'MyDB.php';

class FriendModel {

    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    //获得粉丝,待完成,对每个获得简略信息
    function getFollowers($userid) {
        return MyDB::select(
            'follower',
            'fanid',
            array(
                'where'=>array(
                    'userid'=>$userid
                )
            )
        );
    }

    //获得偶像
    function getFollowings($userid) {
        return MyDB::select(
            'follower',
            'userid',
            array(
                'where'=>array(
                    'fanid'=>$userid
                )
            )
        );
    }

}