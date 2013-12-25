<?php
/**
 * 类别类
 */
class Cate{

    public static function oneLimitCate($cateArr,$html='--',$level=0,$pid=0){
        $arr = array();
        foreach($cateArr as $v){
            if($v['pid']==$pid){
                $v['level'] = $level+1;
                $space = $level==0?'':'&nbsp; &nbsp;';
                $v['html'] = $space.str_repeat($html,$level);
                $arr[] = $v;
                $arr = array_merge($arr,self::oneLimitCate($cateArr,$html,$v['level'],$v['id']));
            }
        }
        return $arr;
    }

}