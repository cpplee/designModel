<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 21:22
 */


class tianqi{

    public static function show(){
        $today = array('tep'=>28,'wind'=>7,'sun'=>'sunny');
        return serialize($today);
    }
}



 class AdapterTianqi extends tianqi
 {

     public static function show()
     {

         $today = parent::show();
         $today = unserialize($today);
         $today = json_encode($today);
         return $today;
     }

 }


//========客户端调用============
$tq = unserialize(tianqi::show());
echo '温度:'.$tq['tep'].'<br />';
echo '风力'.$tq['wind'].'<br />';
echo 'sun:'.$tq['sun'].'<br />';



//============适配器下json数据格式=============,没有修改旧的类，
$tq = AdapterTianqi::show();
$tq = json_decode($tq);
echo '温度:'.$tq->tep.'<br />';
echo '风力'.$tq->wind.'<br />';
echo 'sun:'.$tq->sun.'<br />';
