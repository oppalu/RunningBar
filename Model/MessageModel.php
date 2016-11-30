<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:10
 */

//获得所有消息,发送消息,消息已读,展示消息内容
//活动审核通过,新的关注,收到了新的评论
require_once "MyDB.php";

class MessageModel{

    private static $model = null;

    public static function getInstance(){
        if(self::$model == null)
            self::$model = new MessageModel();
        return self::$model;
    }


    private function __construct()
    {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function getMyMessages($userid) {
        return MyDB::select(
            'message',
            '*',
            array(
                'where'=>array(
                    'receiverid'=>$userid,
                    'state'=>0
                )
            )
        );
    }

    function sendMessage($receiverid,$content) {
        return MyDB::insert(
            'message',
            array(
                'receiverid'=>$receiverid,
                'createtime'=>date('Y-m-d H:m:s',time()),
                'content'=>$content,
                'state'=>0
            )
        );
    }

    function readMessage($id) {
        return MyDB::update(
            'message',
            array(
                'state'=>1
            ),
            array(
                'id'=>$id
            )
        );
    }

}