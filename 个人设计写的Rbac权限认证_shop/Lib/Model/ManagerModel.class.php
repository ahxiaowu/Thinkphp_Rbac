<?php

//后台管理员model模型

class ManagerModel extends Model{
    //用户名和密码校验
    function checkNamePwd($name,$pwd){
        //① 检查用户名是否存在
        $name_info = $this -> getByMg_name($name);
        
        //② 用户名如果存在，就把对应记录的密码信息获取到，与用户传递过来的密码$pwd做比较
        if($name_info != null){
            //密码
            if($name_info['mg_pwd'] != $pwd){
                return false;
            } else {
                return $name_info;
            }
        } else {
            return false;
        }
    }
}