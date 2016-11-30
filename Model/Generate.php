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

    function levelup() {
        $data = MyDB::select(
            'sport',
            'userid,COUNT(*)',
            array(
                'groupby'=>'userid'
            )
        );
        $temp = json_decode($data,true);
        for($i=0;$i<count($temp);$i++) {
            $level = round(log($temp[$i]['COUNT(*)'],2));
            MyDB::update(
                'user',
                array(
                    'level'=>$level
                ),
                array(
                    'userid'=>$temp[$i]['userid']
                )
            );
        }
    }

    function generateUser($location,$interest) {
        $username = $this->generateChars();
        $password = $this->generateChars();
        $phone = $this->generatePhones();
        $time = $this->randomDate('2015-11-27 13:11:56');
        $weight = round(45+mt_rand()/mt_getrandmax()*30);

        return MyDB::insert(
            'user',
            array(
                'username'=>$username,
                'phone'=>$phone,
                'password'=>$password,
                'registertime'=>$time,
                'avatar'=>'public/img/upload/fit1.jpg',
                'sex'=>'女',
                'birth'=>$this->randomDate('1980-01-01 00:00:00'),
                'location'=>$location,
                'interest'=>$interest,
                'level'=>0,
                'weight'=>$weight
            )
        );

    }

    function generateChars() {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ( $i = 0; $i < 8; $i++ ) {
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $password;
    }

    function generatePhones() {
        $chars = '0123456789';
        $password = '159';
        for ( $i = 0; $i < 8; $i++ ) {
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $password;
    }
}