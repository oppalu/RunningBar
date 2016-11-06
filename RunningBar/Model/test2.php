<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/5
 * Time: 22:28
 */
DEFINE ('DB_TYPE','sqlite');
DEFINE ('DB_NAME','../runningbar.db');
//DEFINE ('ERROR_LEVEL', 0); // Set at 0 for development and 1 for production.

require 'MyDB.php';

MyDB::initialize();

//require 'Database.php';
//
//Database::initialize();

$users = MyDB::update(
    'follower',
    array(
        'userid' => 2,
        'fanid' =>2
    ),
    array(
        'userid' => 1
    )
);
print_r($users);
