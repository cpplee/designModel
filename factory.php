<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 13:32
 */

interface db{
    function conn();
}

interface factory{
    function createDB();
}

class dbmysql implements db{
    public function conn(){
        echo '连接上了mysql...';
    }
}

class dbsqlite implements db{
    public function conn(){
        echo '连接上了sqlite...';
    }
}



class mysqlFactory implements Factory{
    function createDB(){
        return new dbmysql();
    }
}

class sqliteFactory implements Factory{
    function createDB(){
        return new dbsqlite();
    }
}
//如果想加Oracle类，直接实现接口就行,实现了不允许修改，可以扩展
class OracleFactory implements Factory{
    function createDB(){
        return new dboracle();
    }
}

class dboracle implements db{
    public function conn(){
        echo '连接上了oracle...';
    }
}

//======客户端开始========

$fact = new mysqlFactory();
$mysql = $fact->createDB();
$mysql->conn();


$fact = new OracleFactory();
$oracle = $fact->createDB();
$oracle->conn();
