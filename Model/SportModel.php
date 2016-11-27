<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:10
 */
require_once "MyDB.php";

class SportModel {

    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }


}