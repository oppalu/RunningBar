<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/30
 * Time: 18:15
 */
require 'FriendModel.php';
$friend = FriendModel::getInstance();

$result = $friend->addFriend(50,51);
print_r($result);