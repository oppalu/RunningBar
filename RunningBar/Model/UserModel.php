<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:09
 */
DEFINE ('DB_TYPE','sqlite');
DEFINE ('DB_NAME','../runningbar.db');

require 'MyDB.php';
MyDB::initialize();

class UserModel {

    function addUser($username,$phone,$password) {
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

    function findPass($username) {
        $result = MyDB::select(
            'user',
            'password',
            array(
                'where'=>array(
                    'username'=>$username
                )
            )
        );
        return $result;
    }

}