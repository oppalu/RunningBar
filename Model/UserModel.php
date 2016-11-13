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
        print_r(MyDB::initialize());
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

    function showUsers() {
        return MyDB::select(
            'user',
            '*'
        );
    }

}