<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/5
 * Time: 15:04
 */

//date_default_timezone_set("Asia/Shanghai");
//session_start();
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('../runningbar.db');
    }
}
//class MyDB extends SQLite3{
//    function __construct(){
//        $this->open('../../fitdayDB.db');
//    }
//}
