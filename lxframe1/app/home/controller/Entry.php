<?php

namespace app\home\controller;

use core\view\View;
use system\model\Student;
use system\model\Article;
use core\Controller;

class Entry extends Controller{
    public function index(){

//        $result = Student::find(1)->toArray();
//      var_dump($result);

//        $post = [
//            'name' => 'Ghoudun',
//            'cid' => '333',
//        ];

//        $result=Student::add($post);
//        var_dump($result);
//        p($result);

//        $olddata=Student::find(7);

//        $result = Student::edit($post);
//        p($result);

//        $result=Student::delete(6);
//        p($result);

        //测试query方法，该方法主要用来处理关联的sql语句
//        $sql='select*from article join article_tag on article.id=article_tag.aid join tags on article_tag.tid=tags.id';
//        $result = Article::query($sql);
//        p($result->toArray());

        return $this->redirect()->message('账号或密码错误');


        return (new View())->make()->with('version','版本:v1.5');


    }

    public function add(){
        return View::make();
    }

}





?>