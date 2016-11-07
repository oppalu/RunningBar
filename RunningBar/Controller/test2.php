<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/5
 * Time: 22:28
 */

require 'UserController.php';

$controller = new UserController();

$username = 'oppalu';
$phone = '13401271090';
$password = '123456';
$t = date('Y-m-d H:m:s',time());

//$result = MyDB::delete(
//    'user',
//    array(
//        'userid'=>4
//    )
//);
//print_r($result);
//$result1 = $controller->register($username,$phone,$password);
$result2 = $controller->login('oppalu','123456');
print_r($result2);





