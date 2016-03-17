<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 13:50
 */
//这个例子引发了如何去实现一个单例模式

//class sigle{
//
//}
//
//$s1 = new sigle();
//$s2 = new sigle();
////注意，2个对象是一个的时候才全等
////2
//if($s1 === $s2){
//   echo '1';
//}else{
//    echo '2';
//}

//留接口new对象,仍然不是一个对象，因为每次进来都要new
//1

//class sigleton{
//
//    public static function getIns(){
//        return new self();
//    }
//
//    protected function __construct(){
//
//    }
//
//}
//
//$s1 = sigleton::getIns();
//$s2 = sigleton::getIns();
//
//if($s1 === $s2){
//
//    echo '1';
//}else{
//    echo '2';
//}

//getIns先判断实例,但是如果被继承也就失效了

//class sigleton {
//
//    protected static $ins = null;
//
//    public static function getIns(){
//        if(self::$ins === null){
//            self::$ins = new self();
//        }
//        return self::$ins;
//    }
//    protected function __construct(){
//    }
//
//}
//$s1 = sigleton::getIns();
//$s2 = sigleton::getIns();
//if($s1 === $s2){
//    echo '1';
//}else{
//    echo '2';
//}



//class multi extends sigleton{
////继承以后破坏了,因为public的存在在继承的时候修改了权限,这时候！！！！！！
////！！！！！！需要加final！！！！！！final protected function __construct(){}
//
//    public function __construct(){
//
//    }
//}
//
//
//$s1= new multi();
//$s2 = new multi();
//if($s1 === $s2){
//    echo '是一个对象';
//}else {
//    echo '不是一个对象';
//}


class sigleton {

    protected static $ins = null;

    public static function getIns(){
        if(self::$ins === null){
            self::$ins = new self();
        }
        return self::$ins;
    }
   final protected function __construct(){

    }

    final protected function __clone(){

    }

}
$s1 = sigleton::getIns();
$s2 = sigleton::getIns();
if($s1 === $s2){
    echo '1';
}else{
    echo '2';
}


//解决了 继承的问题，但是clone的问题并没有解决

$s1 = sigleton::getIns();
$s2 = clone $s1;
if($s1 ===$s2){
    echo '是一个对象';
}else{
    echo '不是一个对象';
}

//可以使用 __clone(){return self::$ins}这样不太好，因为__cline()是一个动态方法
//使用禁止,封锁clone  final protected function __clone(){}


