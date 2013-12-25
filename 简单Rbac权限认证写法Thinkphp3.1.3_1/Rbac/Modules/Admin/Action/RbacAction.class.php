<?php
class RbacAction extends Action{
    //------------------ 角色
    //添加角色
    function addRole(){
        $this->display();
    }
    //添加角色表单处理
    function addRoleSave(){
        if(M('role')->add($_POST)){
            $this->success('添加成功',U('Rbac/role'));
        }else{
            $this->error('添加失败');
        }
    }
    //角色列表
    function role(){
        $this->role = M('role')->select();
        $this->display();
    }
    

    //------------------------------ 节点
    //添加节点
    function addNode(){
        $this->pid = I('pid',0,'intval');
        $this->level = I('level',1,'intval');
        switch($this->level){
            case 1:
                $this->type = '应用';
                break;
            case 2:
                $this->type = '控制器';
                break;
            case 3:
                $this->type = '动作方法';
                break;
        }
        $this->display();
    }
    //添加节点表单处理
    function addNodeSave(){
        if(M('node')->add($_POST)){
            $this->success('添加成功',U('Rbac/node'));
        }else{
            $this->error('添加失败');
        }
    }
    //节点列表
    function node(){
        $field = array('id','name','title','pid');
        $node = M('node')->field($field)->order('sort')->select();
        $node = node_merge($node);
        $this->node = $node;
        $this->display();
    }

    //------------- 配置角色权限
    //配置角色权限显示
    function access(){
        $rid = I('rid',0,'intval'); # 角色ID
        $node = M('node')->order('sort')->select();
        //原有权限
        $access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
        $this->node = node_merge($node,$access);
        $this->rid = $rid;
        $this->display();
    }
    //设置权限
    function setAccess(){
        $rid = I('rid',0,'intval'); # 角色ID
        $data = array();
        $db = M('access');
        //清空原有权限
        $db->where(array('role_id'=>$rid))->delete();
        foreach($_POST['access'] as $v){
            $tmp = explode('_', $v);
            $data[] = array(
                'role_id' => $rid,
                'node_id' => $tmp[0],
                'level'   => $tmp[1]
            );
        }
        //插入新权限
        $result = $db->addAll($data);
        if($result){
            $this->success('配置角色权限成功!',U('Rbac/role'));
        }else{
            $this->error('配置失败');
        }
    }

    //------------------ 用户
    //添加用户
    function addUser(){
        $this->role = M('role')->select();
        $this->display();
    }
    //添加用户表单处理
    function addUserSave(){
        //用户信息
        $userArr = array(
            'username'=>I('username'),
            'password'=>I('password','','md5'),
            'logintime'=>time(),
            'loginip'=>get_client_ip()
        );

        //所属角色
        $roleArr = array();
        if($uid = M('user')->add($userArr)){
            foreach($_POST['roid_id'] as $v){
                $roleArr[] = array(
                    'role_id'=>$v,
                    'user_id'=>$uid
                );
            }
            M('role_user')->addAll($roleArr);
            $this->success('添加成功!',U('Rbac/index'));
        }else{
            $this->error('添加失败');
        }
    }

    //用户列表
    function index(){
        $field = array('id','username','logintime','loginip','lock');
       #$res = D('UserRelation')->field($field)->relation(true)->select();
        $this->user = D('UserRelation')->field('password',true)->relation(true)->select();
        $this->display();
    }

    
    
    
}