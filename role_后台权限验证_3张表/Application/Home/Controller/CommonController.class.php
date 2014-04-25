<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	// 初始化的时候控制用户访问的模块和操作方法
	function _initialize(){
		// 获得当前请求的模块和方法,然后与角色拥用的模块-方法权限对比
		$ac = CONTROLLER_NAME.'-'.ACTION_NAME;

		$sql = "select role_auth_ac from __PREFIX__user a join __PREFIX__role b on a.role_id=b.role_id where a.id=".I('session.uid');
		$info = M()->query($sql);
		$auth_ac = $info[0]['role_auth_ac'];
		if(stripos($auth_ac,$ac)===false && (I('session.uname')!=C('SUPERADMIN'))){
			echo 'Access denied';
			exit;
		}

	}
}
?>