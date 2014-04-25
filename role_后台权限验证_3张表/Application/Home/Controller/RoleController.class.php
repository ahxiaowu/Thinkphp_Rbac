<?php
namespace Home\Controller;
use Home\Controller\CommonController;
class RoleController extends CommonController{
	function index(){
		$this->info = D('Role')->select();

		$this->display();
	}


	function add(){
		$this->display();
	}

	//分配权限方法
	function auth($role_id){
		$db = M('auth');

		if(IS_POST){
			$role_id = I('role_id');
			$auth_id = implode(',',I('authID'));

			$row = M('auth')->field(array('auth_c','auth_a'))->where(array('auth_id'=>array('in',I('authID')),'auth_level'=>array('neq','0')))->select();

			$role_auth_ac = '';
			foreach($row as $v){
				$role_auth_ac .= $v['auth_c'].'-'.$v['auth_a'].',';
			}

			$role_auth_ac = rtrim($role_auth_ac,',');

			$data = array(
				'role_auth_ids'=>$auth_id,
				'role_auth_ac' =>$role_auth_ac
			);
			M('role')->where(array('role_id'=>$role_id))->save($data);
			$this->success('分配权限成功!','index');

		}else{
			# 获得全部的权限信息
			$this->pauth = $db->where(array('auth_level'=>0))->select();
			$this->sauth = $db->where(array('auth_level'=>1))->select();
			$this->tauth = $db->where(array('auth_level'=>2))->select();

			# 获得对应分配角色的名称
			$roleName = M('role')->getByRole_id($role_id);
			$this->roleName = $roleName['role_name']; 		# 角色名称
			$this->roleids  = $roleName['role_auth_ids'];   # 权限ID值
			$this->role_id  = $role_id;						# 角色ID

			$this->display();			
		}
	}



}
?>