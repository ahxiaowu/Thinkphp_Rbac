<?php

//权限控制器

class AuthAction extends Action{
    function showlist(){
        
        //获得全部权限
        $info = D("Auth")->order("auth_path")->select();
        //权限父子级有缩进关系
        foreach($info as $k => $v){
            $info[$k]['auth_name'] = str_repeat("-/",$v['auth_level']).$info[$k]['auth_name'];
        }
        $this -> assign("info",$info);
        
        $this -> display();
    }
    
    function add(){
        //判断表单是否提交数据
        if(!empty($_POST)){
//            /show_bug($_POST);
            //在model模型里边制作一个方法处理权限添加
            $rst = D("Auth")->saveAuth($_POST);
            if($rst){
                $this -> success("添加权限成功",U("Auth/showlist"));
            }
        } else {
            $info = D("Auth")->where('auth_level<2')->order("auth_path")->select();
            //权限父子级有缩进关系
            foreach($info as $k => $v){
                $info[$k]['auth_name'] = str_repeat("-/",$v['auth_level']).$info[$k]['auth_name'];
            }
            //show_bug($info);
            $authinfo = array(); //array(1=>商品管理,2=>商品列表...)
            foreach($info as $kk => $vv){
                $authinfo[$vv['auth_id']] = $vv['auth_name'];
            }
            $this -> assign("authinfo",$authinfo);
            $this -> display();
        }
    }
}