<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/5
 * Time: 22:28
 */

require 'UserController.php';
$controller = new UserController();

$result = $controller->login('test','test');
print_r($result);

