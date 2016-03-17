<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 18:38
 */






class board{

    protected $power=1;
    protected $top='admin';//视情况而定

    public function process($lev){

        if($lev <=$this->power){
            echo '版主删帖';
        }else{
          $toper= new $this->top();
            $toper->process($lev);
        }


    }
}


class admin{

    protected $power=2;
    protected $top='police';//视情况而定

    public function process($lev){
       if($lev<=$this->power){
           echo '封号';
       }else{
           $toper= new $this->top();
           $toper->process($lev);
       }

    }
}

class police{

    protected $power=3;

    public function process($lev){
        if($lev<=$this->power){
            echo '抓起来';
        }else{
            echo '最高权限';
        }
    }
}

$lev = $_POST['jubao']+0;
//这是面向过程的做法

//if($lev == 1){
//    $board = new board();
//    $board->process();
//}elseif($lev==2){
//    $admin = new admin();
//    $admin->process();
//}else{
//    $police = new police();
//    $police->process();
//}

$jude = new board();
$jude->process($lev);