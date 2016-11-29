<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/15
 * Time: 09:33
 */

//require 'FriendModel.php';
//
//$friend = new FriendModel();
//
//$result = $friend->isFriend(9,8);
//print_r($result);

//require 'UserModel.php';
//
//$user = new UserModel();
//
//$result = $user->searchUser('sy');
//print_r($result);

require 'PostModel.php';
$post = new PostModel();

$result = $post->getFriendPosts(9);
print_r($result);

//require 'Generate.php';
//$test = new Generate();
//for ($i=0;$i<24;$i++) {
//    $test->generateData(19,'2015-02-26 21:11:05',67,'walk');
//}