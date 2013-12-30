<?php

import("@.components.AdminAction");
class RoleAction extends AdminAction{
    function showlist(){
        $info = D("Role")->select();
        
        $this -> assign('info',$info);
        $this -> display();
    }
    
    //分配权限方法
    function distribute($role_id){
        
        //表单数据收集
        if(!empty($_POST)){
            //给角色分配具体权限
            $rst = D("Role")->distributeAuth($_POST['auth_name'],$role_id);  //普通模型方法
            if($rst){
                $this -> success("分配权限成功",U("Role/showlist"));
            }
        }else {
            //获得全部权限信息
            $p_auth = D("Auth")->where("auth_level=0")->select();
            $s_auth = D("Auth")->where("auth_level=1")->select();
            $t_auth = D("Auth")->where("auth_level=2")->select();

            //根据$role_id查询对应角色名称
            $role_info = D("Role")->getByRole_id($role_id);
            $role_name = $role_info['role_name'];  //角色名称
            $role_auth_ids = $role_info['role_auth_ids'];  //权限id值
            $this -> assign('role_name', $role_name);
            $this -> assign('role_auth_ids', explode(',',$role_auth_ids));

            $this -> assign('p_auth',$p_auth);
            $this -> assign('s_auth',$s_auth);
            $this -> assign('t_auth',$t_auth);

            $this -> display();
        }
    }
}