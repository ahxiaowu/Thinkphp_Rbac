<?php

//权限model模型
class AuthModel extends Model{
    function saveAuth($info){
        $auth_pid = $info['auth_pid'];
        $auth_id = $this -> add($info); //返回id值 new id
        //处理auth_path
        //① 如果当前权限是顶级的，auth_path=====auth_id本身记录id值
        if($auth_pid == 0){
            $auth_path = $auth_id;
        } else {
        //② 如果当前权限不是顶级的，auth_path===父级的auth_path与本身id用"-"连接
            //获得父级的auth_path
            $p_info = $this -> getByAuth_id($auth_pid);
            $p_auth_path = $p_info['auth_path'];
            $auth_path = $p_auth_path."-".$auth_id;
        }
        //处理auth_level
        //根据auth_path处理  10-11-35  查找“-”的个数就是auth_level的值
        $auth_level = count(explode("-",$auth_path))-1;
        //update更新数据
        $d = array(
            'auth_id' => $auth_id,
            'auth_path' => $auth_path,
            'auth_level' => $auth_level
        );
        return $this -> save($d);
    }
}