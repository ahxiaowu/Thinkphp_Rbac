<?php
/**
 * 用户欢迎
 */
namespace Home\Controller;
use Think\Controller;
class WelcomeController extends Controller{
	function index(){
		$uid = I('session.uid');

		$sql = "select b.role_auth_ids from __PREFIX__user a join __PREFIX__role b on a.role_id=b.role_id where a.id=$uid";
		$info = M()->query($sql);
		$auth_ids = $info[0]['role_auth_ids'];


		//查询具体的权限
		$authModel = M('auth');
		//父权限
		if(I('session.uname')==C('SUPERADMIN')){
			$this->prow = $authModel->where(array('auth_level'=>'0'))->select();
		}else{
			$this->prow = $authModel->where(array('auth_id'=>array('in',$auth_ids),'auth_level'=>'0'))->select();
		}
		
		//子权限
		if(I('session.uname')==C('SUPERADMIN')){
			$this->srow = $authModel->where(array('auth_level'=>'1'))->select();
		}else{
			$this->srow = $authModel->where(array('auth_id'=>array('in',$auth_ids),'auth_level'=>'1'))->select();
		}

		$this->display();
	}

	function welcome(){
		echo 'welcome';
	}



}
?>