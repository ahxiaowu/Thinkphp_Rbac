<?php

//后台主架构控制器

class IndexAction extends Action{
    //默认调用index方法
    function index(){
        $this -> display();
    }
    
    //"品"字头部
    function head(){
        //查看系统有哪些常量可以使用
        
        //获得全部常量信息，true，常量根据类型进行分类显示
        //var_dump(get_defined_constants(true));
        $this -> display();
    }
    
    //"品"字左边
    function left(){
        //用户--角色--权限
        //给左边传递数据，可以直接使用
        //$_SESSION['mg_id']
        //manager    role    auth
        $model = M();
        
        $sql = "select b.role_auth_ids from sw_manager a join sw_role b on a.mg_role_id=b.role_id where a.mg_id=".$_SESSION['mg_id'];
        
        $info = $model -> query($sql);
        $auth_ids = $info[0]['role_auth_ids'];
        
        //查询具体权限
        //查询父权限
        $sql = "select * from sw_auth where auth_level=0";
        if($_SESSION['mg_id'] != 1){
            $sql .=" and auth_id in ($auth_ids)";
        }
        $p_auth_info = $model -> query($sql);
        //查询子权限
        $sql = "select * from sw_auth where auth_level=1";
        if($_SESSION['mg_id'] != 1){
            $sql .=" and auth_id in ($auth_ids)";
        }
        $s_auth_info = $model -> query($sql);

        $this -> assign('p_auth', $p_auth_info);
        $this -> assign('s_auth', $s_auth_info);
        
        $this -> display();
    }
    
    function right(){
        $this -> display();
    }
}