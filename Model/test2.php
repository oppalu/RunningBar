<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/13
 * Time: 16:26
 */
require 'MyDB.php';

class User {
    private static $DB;

    function __construct() {
        self::$DB = MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function showUsers() {
//        $sql = 'SELECT * FROM "user"';
//
//        $query = self::$DB->prepare($sql);
//        $query->execute();
//        $result = $query->fetchAll();
//        return json_encode($result);
        return MyDB::select(
            'user',
            '*'
        );
    }

}