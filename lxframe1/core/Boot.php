<?php
namespace core;

class Boot{
    public function run(){
        //获取get参数
        if (isset($_GET['s'])){
//            切割get中的s
            $info = explode('/',$_GET['s']);
            //定义默认模块名称变量
            $m=$info[0];
            //定义默认控制器名称变量
            $c=ucfirst($info[1]);
            //定义默认方法名称变量
            $a=$info[2];
        }else{
            $m='home';
            $c='Entry';
            $a='index';
        }
//        定义3个常量
        define('MODULE',$m);
        define('CONTROLLER',$c);
        define('ACTION',$a);

        $class = '\app\\'.$m.'\controller\\'.$c;
        //使用回调函数来调用对应模块的对应控制器的对应方法
        echo call_user_func_array([new $class,$a],[]);

    }
}





?>