<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:09
 */

require 'MyDB.php';

class UserModel {

    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function register($username,$phone,$password) {
        if($username == null)
            return '用户名不能为空!';
        if($password == null)
            return '密码不能为空!';
        if (strlen($phone) != 11)
            return '手机号码格式错误!';
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
        if($username == null || $password == null)
            return '用户名与密码不得为空!';
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
                )
            )
        );
    }

    function getUserId($username) {
        return MyDB::select(
            'user',
            'userid',
            array(
                'where'=>array(
                    'username'=>$username
                )
            )
        );
    }
}