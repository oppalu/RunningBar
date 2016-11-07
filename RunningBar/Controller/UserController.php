<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
require ('../Model/UserModel.php');


class UserController {
    private $user;

    function __construct() {
        $this->user = new UserModel();
    }

    function register($username,$phone,$password) {
        return $this->user->addUser($username,$phone,$password);
    }

    function login($username,$password) {
        $temp = json_encode($this->user->findPass($username),TRUE);
        $real = $temp[0]['password'];
        return $real == $password;
    }
}