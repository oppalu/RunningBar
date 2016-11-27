<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:10
 */
require_once "MyDB.php";

class PostModel {

    function __construct() {
        MyDB::initialize();
        date_default_timezone_set("Asia/Shanghai");
    }

    function addPost($userid,$title,$content) {
        return MyDB::insert(
            'dynamics',
            array(
                'title'=>$title,
                'authorid'=>$userid,
                'createtime'=>date('Y-m-d H:m:s',time()),
                'content'=>$content,
                'like'=>0
            )
        );
    }

    function deletePost($postid) {
        return MyDB::delete(
            'dynamics',
            array(
                'id'=>$postid
            )
        );
    }

    function getMyPosts($userid) {
        return MyDB::select(
            'dynamics',
            '*',
            array(
                'where'=>array(
                    'authorid'=>$userid
                )
            )
        );
    }

    function getPostDetail($postid) {
        return MyDB::select(
            'dynamics,user',
            array(
                'title',
                'username',
                'createtime',
                'content',
                'like',
                'avatar'
            ),
            array(
                'where'=>array(
                    'id'=>$postid
                ),
                'whereother'=>'user.userid=dynamics.authorid',
                'single'=>'true'
            )
        );
    }

    function getFriendPosts($userid) {
        return MyDB::select(
            'dynamics,follower,user',
            array(
                'username',
                'id',
                'title',
                'createtime',
                'content',
                'like',
                'avatar'
            ),
            array(
                'where'=>array(
                    'fanid'=>$userid
                ),
                'whereother'=>'user.userid=follower.userid AND user.userid=dynamics.authorid'
            )
        );
    }

    function like($postid) {
        $current = $this->getLike($postid)+1;
        return MyDB::update(
            'dynamics',
            array(
                'like'=>$current
            ),
            array(
                'id'=>$postid
            )
        );
    }

    function getLike($postid) {
        return MyDB::select(
            'dynamics',
            'like',
            array(
                'where'=>array(
                    'id'=>$postid
                )
            )
        );
    }

    function showComments($postid) {
        return MyDB::select(
            'comment,user',
            array(
                'username',
                'createtime',
                'content',
                'avatar'
            ),
            array(
                'where'=>array(
                    'dynamicsid'=>$postid
                ),
                'whereother'=>'user.userid=comment.authorid'
            )
        );
    }

    function addComment($userid,$dynamicsid,$content) {
        return MyDB::insert(
            'comment',
            array(
                'dynamicsid'=>$dynamicsid,
                'authorid'=>$userid,
                'createtime'=>date('Y-m-d H:m:s',time()),
                'content'=>$content
            )
        );
    }
}