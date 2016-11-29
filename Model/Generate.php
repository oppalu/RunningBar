<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/29
 * Time: 15:16
 */
require_once "MyDB.php";

class Generate {
    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function generateData($userid,$registertime,$weight,$type) {
        $date = $this->randomDate($registertime);
        $distance = 3+mt_rand()/mt_getrandmax()*7;
        $format_number = number_format($distance,2,'.','');
        $calorie = round($format_number * $weight);
        MyDB::insert(
            'sport',
            array(
               'userid'=>$userid,
                'createtime'=>$date,
                'type'=>$type,
                'distance'=>$format_number,
                'calorie'=>$calorie
            )
        );
    }

    function randomDate($begintime) {
        $begin = strtotime($begintime);
        $endtime = date('Y-m-d H:m:s',time());
        $end = strtotime($endtime);
        $timestamp = rand($begin, $end);
        return date("Y-m-d H:m:s", $timestamp);
    }
}