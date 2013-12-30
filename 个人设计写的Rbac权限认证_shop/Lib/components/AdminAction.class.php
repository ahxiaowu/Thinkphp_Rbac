<?php

//普通控制器父类
class AdminAction extends Action{
    //控制器用户访问的模块和操作方法
    function __construct() {
        parent::__construct();
        //获得当前请求的模块和方法
        //然后与角色拥有的模块-方法权限对比
        //MODULE_NAME
        //ACTION_NAME
        $ac = MODULE_NAME."-".ACTION_NAME; //Goods-add
        $sql = "select role_auth_ac from sw_manager a join sw_role b on a.mg_role_id=b.role_id where mg_id=".$_SESSION['mg_id'];
        $info = M()->query($sql);
        $auth_ac = $info[0]['role_auth_ac'];
        if(strpos($auth_ac,$ac)===false && $_SESSION['mg_id']!=1){
            //error()与success方法一致
            $this -> error('没有权限访问',U("Index/right"));
        }
    }
}