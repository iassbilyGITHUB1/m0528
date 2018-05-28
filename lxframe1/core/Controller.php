<?php
namespace core;

class Controller{
    //定义默认跳转的属性
    protected $url = 'location.href = window.history.back()';

    //操作成功的跳转方法
    public function redirect($url = ''){
        if ($url !=''){
            $this->url="location.href='".$url."'";
        }
        return $this;
    }

    //操作成功或失败的提示方法
    public function message($msg){
        include 'public/view/message.php';
    }

}





?>