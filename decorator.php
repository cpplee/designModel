<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/1
 * Time: 20:23
 */

class BaseArt{

    protected $content;
    protected $art =null;

    public function __construct($content){
        $this->content = $content;

    }

    public function decorator(){

        return $this->content;
    }

}




class BianArt extends BaseArt {

    public function __construct(BaseArt $art){

        $this->art = $art;
       // print_r($art);
        $this->decorator();
    }

    public function decorator(){

        return $this->content=$this->art->decorator().'小编加了摘要';
    }
}


class SEOArt extends BaseArt {

    public function __construct(BaseArt $art){

        $this->art = $art;
        $this->decorator();
    }

    public function decorator(){

        return $this->content=$this->art->decorator().'小编加了SEO';
    }
}

$art = new SEOArt(new BianArt(new BaseArt('好好学习')));
echo $art->decorator();