<?php

//定义连接数据库的配置项数组
$config = [
    'host' => 'localhost',
    'dbname' => 'c92',
    'username' => 'root',
    'password' => 'root',
];

//由于这个文件是被自动加载的,优先于其他的任何方法,在这里调用Model类里面的getConfig方法,getConfig()方法是最优先执行的方法
\core\model\Model::getConfig($config);





?>