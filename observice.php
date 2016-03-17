<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 14:44
 */
//被观察者
class user implements SplSubject{

    public $lognum;
    public $hobby;

    protected $obervers;

    public function __construct(){

        $this->lognum=rand(1,10);

        $hobby=array('sports','feed');
        shuffle($hobby);
        $this->hobby=$hobby;
        $this->observers = new SplObjectStorage();

    }

    public function login(){

         $this->notify();

    }

    public function attach(SplObserver $observer){

        $this->observers->attach($observer);

      }
    public function detach(SplObserver $observer){

        $this->observers->detach($observer);

    }

    public function notify()
    {
        $this->observers->rewind();
        while ($this->observers->valid()) {
            $observer = $this->observers->current();
            $observer->update($this);
            $this->observers->next();
        }
    }
}

class secrity implements SplObserver{

    public function update(SplSubject $subject){
        if($subject->lognum<3){
            echo '这是第'.$subject->lognum.'次安全登录';
        }else{

            echo '这是第'.$subject->lognum.'次异常登录';
        }
    }
}


class ad implements SplObserver{

    public function update(SplSubject $subject){
        if('sports'==$subject->hobby[0]){
            echo 'sports';
        }else{
            echo 'feed';
        }
    }
}

$user = new user();
$user->attach(new secrity());
$user->attach(new ad());
$user->login();