<?php
namespace core\view;

class Base{
    //定义模板文件路径属性
    protected $file;

//    定义模板变量属性
    protected $vars;


    public function make(){
        $this->file="app/".MODULE."/view/".strtolower(CONTROLLER)."/".ACTION.".php";
        return $this;
    }

    public function with($name,$value){
        $this->vars[$name]=$value;
        return $this;
    }





//当有对象被输出的时候,会自动触发这个方法
    public function __toString()
    {

        //处理当前对象的变量属性，将键名变成变量名，将键值变成变量值
        extract($this->vars);
//var_dump($this->vars);

        include $this->file;


        return '';
    }


}



?>