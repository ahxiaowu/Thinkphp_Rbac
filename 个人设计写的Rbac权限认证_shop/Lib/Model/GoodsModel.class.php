<?php

//商品model模型类
//Model是普通模型的父类
//ThinkPHP/Lib/Core/Model.class.php

class GoodsModel extends Model{
    //获取商品信息
    function getInfo(){
        //1 首先去缓存里边获得商品信息
        $goods = S("info");
        //2. 如果缓存里边有商品信息，直接返回,
        //   否则去数据库获得数据,并生成缓存供下次调用
        if(!empty($goods)){
            return $goods;
        } else {
            $goods = "apple".time();  //从数据获得商品信息
            //再把信息放入缓存，供下次调用
            S("info",$goods,10);
            return $goods;
        }
    }
}
