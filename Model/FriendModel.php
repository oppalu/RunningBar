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

    function getFollowers($userid) {
        return MyDB::select(
            'follower,user',
            array(
                'username',
                'sex',
                'slogen',
                'avatar',
                'location'
            ),
            array(
                'where'=>array(
                    'follower.userid'=>$userid
                ),
                'whereother'=>'user.userid=follower.fanid'
            )
        );
    }

    //获得偶像
    function getFollowings($userid) {
        return MyDB::select(
            'follower,user',
            array(
                'username',
                'sex',
                'slogen',
                'avatar',
                'location'
            ),
            array(
                'where'=>array(
                    'follower.fanid'=>$userid
                ),
                'whereother'=>'user.userid=follower.userid'
            )
        );
    }

}