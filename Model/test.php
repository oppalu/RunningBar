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

require 'ActivityModel.php';
$post = new ActivityModel();

$result = $post->showActivities();
print_r($result);