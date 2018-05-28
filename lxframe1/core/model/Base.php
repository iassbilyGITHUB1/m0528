<?php
namespace core\model;

class Base{
    //定义pdo属性
    protected $pdo;
    //定义表明属性
    protected $table;
    //定义where属性
    protected $where;

    //定义静态主键属性
    protected static $pri;

   public function __construct($config,$table)
    {
        //将获得到的表名赋值给属性
        $this->table=$table;
        //自动执行连接数据库方法
        $this->connect($config);
    }

    public function connect($config){
        //判断当前pdo属性是否为null，如果为null，就连接数据库，如果不为null，代表连接过，就不再连接
        if (is_null($this->pdo)){
            $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
            $username = $config['username'];
            $password = $config['password'];
            try{
                $this->pdo = new \PDO($dsn,$username,$password);
                $this->pdo->query('set names utf8');
            }catch (\PDOException $e){
                die($e->getMessage());
            }
        }

    }

    public function getPriKey(){
        $sql = 'desc '.$this->table;
        $info = $this->pdo->query($sql);
        $data = $info->fetchAll(\PDO::FETCH_ASSOC);
        //定义一个空字符串用来接收主键名称的值
        $priKey = '';
        foreach ($data as $k=>$v){

            if ($v['Key']=='PRI'){
                $priKey=$v['Field'];
                break;
            }
        }
        //将主键名称返回
        return $priKey;
    }


    public function where($where){
        $this->where=' where '.$where;
        return $this;
    }

    public function get(){
        $sql = 'select*from'.$this->table . $this->where;
        $result = $this->pdo->query($sql);
        $data=$result->fetchAll(\PDO::FETCH_ASSOC);

        $this->data = $data;
        return $this;
    }

    public function find($pri){
        //获取主键名称

        $prikey = $this->getPriKey();
        $sql = "select * from ".$this->table." where ".$prikey." = ".$pri;
        $result = $this->pdo->query($sql);
//        $data = $result->fetch(\PDO::FETCH_ASSOC);
        $data = $result->fetch(\PDO::FETCH_ASSOC);
        $this->data = $data;

        self::$pri=$pri;
//echo self::$pri;
        return $this;

    }

    public function toArray(){
        return $this->data;
    }

    //接着之前的方法写

    //添加数据方法
    public function add($data){
        //循环data需要存入数据
        //定义一个接受字段名的字符串
        $keyStr='';
        //定义一个接受字段值的字符串
        $valueStr='';
        foreach($data as $k=>$v){
            $keyStr.=$k.',';
            $valueStr.='"'.$v.'",';
        }
        //将最后的逗号去掉
        $keyStr=rtrim($keyStr,',');
        $valueStr=rtrim($valueStr,',');
        //组合sql语句
        $sql='insert into '.$this->table.'('.$keyStr.') values('.$valueStr.')';

        //用pdo对象调用exec方法来完成添加
        $data=$this->pdo->exec($sql);

//        将$data返回
        return $data;
    }

    //编辑数据方法
    public function edit($data){
       //循环$data,组合sql语句中需要的字符串
        $str='';
        foreach($data as $k=>$v){
            $str.=$k.'="'.$v.'",';
        }
        $str=rtrim($str,',');

        //获取主键名称
        $priKey=$this->getPriKey();
        //组合sql语句
        $sql="update ".$this->table." set ".$str." where ".$priKey." = ".self::$pri;
//        echo $sql;
        $data=$this->pdo->exec($sql);
        //将$data返回
        return $data;

    }

    //删除数据方法
    public function delete($pri){
       //获取主键名称
        $priKey=$this->getPriKey();
        $sql="delete from ".$this->table." where ".$priKey." = ".$pri;
        $data = $this->pdo->exec($sql);
        return $data;
    }


    //多表查询的query方法
    public function query($sql){
       //直接使用pdo对象调用PDO的query方法获取关联表的数据
        $result=$this->pdo->query($sql);
        $data=$result->fetchAll(\PDO::FETCH_ASSOC);
        //将当前对象，将data数据存入当前对象的临时属性中
        $this->data=$data;
        return $this;
    }





}




?>