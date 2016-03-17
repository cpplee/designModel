<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 12:36
 */

abstract class Tiger{

    public abstract function climb();

}

class XTiger extends Tiger{

    public function climb(){
        echo '摔下来';
    }
}

class MTiger extends Tiger{

    public function climb(){
        echo '爬树';
    }
}

class Cat{

    public function climb(){

        echo '飞到天上去';
    }
}

class Client{
//是否使用Tiger类
    public function call(Tiger $animal){
          $animal->climb();

    }

}

$client = new Client();

$client->call(new XTiger());
$client->call(new MTiger());
$client->call(new Cat());


//这个例子说明 如果限制类型就是java的多态，但是对于php来说可以不用限制类型，多态没有意义




