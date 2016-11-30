<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:09
 */

require_once 'MyDB.php';

class UserModel {

    private static $model = null;

    public static function getInstance(){
        if(self::$model == null)
            self::$model = new UserModel();
        return self::$model;
    }


    private function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function register($username,$phone,$password) {
        $result = MyDB::insert(
            'user',
            array(
                'username'=>$username,
                'phone'=>$phone,
                'password'=>$password,
                'registertime'=>date('Y-m-d H:m:s',time()),
                'level'=>0
            )
        );
        return $result;
    }

    function login($username,$password) {
        $result = MyDB::select(
            'user',
            'password',
            array(
                'where'=>array(
                    'username'=>$username
                )
            )
        );
        $temp = json_decode($result,TRUE);
        $real = $temp[0]['password'];
        return $real == $password;
    }

    function getUserInfo($userid) {
        return MyDB::select(
            'user',
            '*',
            array(
                'where'=>array(
                    'userid'=>$userid
                ),
                'single'=>'true'
            )
        );
    }

    function updateUser($username,$avatar,$sex,$weight,$birth,$location,$interest,$slogen) {
        return MyDB::update(
            'user',
            array(
                'sex'=>$sex,
                'avatar'=>$avatar,
                'weight'=>$weight,
                'birth'=>$birth,
                'location'=>$location,
                'interest'=>$interest,
                'slogen'=>$slogen
            ),
            array(
                'username'=>$username
            )
        );
    }

    function updatePassword($username,$password) {
        return MyDB::update(
            'user',
            array(
                'password'=>$password
            ),
            array(
                'username'=>$username
            )
        );
    }

    function getUserId($username) {
        $temp =  MyDB::select(
            'user',
            'userid',
            array(
                'where'=>array(
                    'username'=>$username
                )
            )
        );
        $result = json_decode($temp,TRUE);
        return $result[0]['userid'];
    }

    function searchUser($keyword) {
        $temp = 'username LIKE \'%'. $keyword. '%\'';
        return MyDB::select(
            'user',
            '*',
            array(
                'whereother'=>$temp
            )
        );
    }

    function isFriend($myid,$fanid) {
        $result = MyDB::select(
            'follower',
            '*',
            array(
                'where'=>array(
                    'userid'=>$fanid,
                    'fanid'=>$myid
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

    function getFollowerNum($userid) {
        return MyDB::select(
            'follower',
            'COUNT(*) AS followerNum',
            array(
                'where'=>array(
                    'userid'=>$userid
                ),
                'single'=>'true'
            )
        );
    }

    function getFollowingNum($userid) {
        return MyDB::select(
            'follower',
            'COUNT(*) AS followingNum',
            array(
                'where'=>array(
                    'fanid'=>$userid
                ),
                'single'=>'true'
            )
        );
    }
}