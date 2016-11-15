<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/15
 * Time: 09:33
 */

require 'FriendModel.php';

$friend = new FriendModel();

$result = $friend->getFollowers(2);
print_r($result);