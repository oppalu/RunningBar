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


}