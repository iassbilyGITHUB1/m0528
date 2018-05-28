<?php
namespace core\model;

class Model{
    //定义连接数据库配置项属性
    protected static $config;

    public function __call($name, $arguments)
    {
        return self::parseAction($name,$arguments);
    }
    public static function __callStatic($name, $arguments)
    {
        return self::parseAction($name,$arguments);
    }


    public static function parseAction($name,$arguments){
        //获取当前调用的类的名称
        $info = get_called_class();
        //把$info切割成数组，然后取下表为2的调用类的名称
        $table = explode('\\',$info)[2];
        $table=strtolower($table);
        return call_user_func_array([new Base(self::$config,$table),$name],$arguments);

    }
//
//    //获取配置项方法
    public static function getConfig($config){
        self::$config = $config;
    }
//    protected static $config;
//
//    public function __call($name, $arguments)
//    {
//        return self::parseAction($name, $arguments);
//    }
//
//    public static function __callStatic($name, $arguments)
//    {
//        return self::parseAction($name, $arguments);
//    }
//
//    public static function parseAction($name, $arguments){
//        //使用一个方法,来获取当前调用的类的名称
//        $info = get_called_class();
//        //把$info切割成数组,然后取下标为2的就是调用的类的名称
//        //我们开发框架的时候规定,用户想操作哪个表,就用哪个表名相同名字的类来调用方法,得到的类名称就是表名称
//        $table = explode('\\',$info)[2];
//        $table = strtolower($table);
//        return call_user_func_array([new Base(self::$config,$table),$name],$arguments);
//    }
//    public static function getConfig($config){
//        //将$config变成一个当前对象的属性
//        self::$config = $config;
//    }


}








?>