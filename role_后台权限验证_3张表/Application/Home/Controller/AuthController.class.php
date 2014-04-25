<?php
/**
 * 权限管理
 */
namespace Home\Controller;
use Home\Controller\CommonController;
class AuthController extends CommonController {
	function index(){
		# 获得全部的权限
		$info = M('auth')->order('auth_path')->select();
		foreach($info as $k=>$v){
			if($v['auth_pid']!=0){
				$v['auth_name'] = str_repeat('----', $v['auth_level']).$v['auth_name'];
			}
			$info[$k]['auth_name'] = $v['auth_name'];
		}
		$this->info = $info;		
		$this->display();
	}

	//添加权限
	function add(){
		if(IS_POST){
			$auth_pid = I('auth_pid');			
			$data = array(
				'auth_name'=>I('auth_name'),
				'auth_c'=>I('auth_c'),
				'auth_a'=>I('auth_a'),
				'auth_pid'=>$auth_pid
			);
			$auth_id = M('auth')->add($data);

			# 处理auth_path
			# 如果当前的权限是顶级的,auth_path等于auth_id本身的ID值
			# 如果当前权限不是顶级的,auth_path等于父级的auth_path加上本身的id

			if($auth_pid == 0){
				$arr['auth_path'] = $auth_id;
			}else{
				$pinfo = M('auth')->getByAuth_id($auth_pid);
				$p_auth_path = $pinfo['auth_path'];
				$arr['auth_path'] = $p_auth_path.'-'.$auth_id;
			}

			# 处理auth_level可以根据auth_path来处理
			$heng = explode('-', $arr['auth_path']);
			$arr['auth_level'] = count($heng)-1;

			M('auth')->where(array('auth_id'=>$auth_id))->save($arr);
			$this->success('添加权限成功!!','index');

		}else{
			# 获得全部的权限
			$info = M('auth')->where(array('auth_level'=>array('lt',2)))->order('auth_path')->select();
			$authInfo = array();
			foreach($info as $k=>$v){
				if($v['auth_pid']!=0){
					$v['auth_name'] = str_repeat('----', $v['auth_level']).$v['auth_name'];
				}
				$authInfo[$v['auth_id']] = $v['auth_name'];
			}

			$this->authInfo = $authInfo;
			$this->display();
		}
	}





}
?>