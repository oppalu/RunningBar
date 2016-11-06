<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/5
 * Time: 22:28
 */
DEFINE ('DB_TYPE','sqlite');
DEFINE ('DB_NAME','../runningbar.db');

require 'MyDB.php';

MyDB::initialize();

$users = MyDB::select(
    'comment',
    'COUNT(*)',
    array(
        'orderby'=>'authorid DESC'
    )
);
print_r($users);
