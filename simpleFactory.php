<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 13:02
 */
//共同接口

interface db{

    function  conn();

}


//服务器端开发（不知道将会被谁调用）

class dbmysql{

        public function conn(){

            echo '连接上了Mysql...';
        }

}


class dbsqlite{

    public function conn(){

        echo '连接上了sqlite';
    }

}


//工厂前身，客户端知道的消息太多了，所以我们需要一个工厂类，来实现简单工厂模式
//==客户端，看不到dbmysql,dbsqlite的内部细节，只知道实现了db接口
//$db = new dbmysql();
//$db->conn();
//
//$db = new dbsqlite();
//$db->conn();



//原来需要知道服务器端2个类名，现在只需要知道有一个工厂，客户和服务器之间 只有 一个通道
//但是这种方法对于新增的类（例如Orcal的连接），这个时候这个简单工厂会显得非常麻烦
//面对对象有个原则是开闭原则，开放扩展，关闭修改
class Factory{

    public static function createDB($type){

        if($type=='mysql'){
            return new dbmysql();
        }else if($type =='sqlite'){
            return new dbsqlite();
        }else{
            throw new Exception('Error Processing Request',1);
        }

    }

}

$mysql = Factory::createDB('mysql');
$mysql->conn();








