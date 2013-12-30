<?php

class ManagerAction extends Action {

	function login() {

		//表单验证
		if(!empty($_POST)){
			//判断验证是否正确
			if(md5($_POST['captcha']) == session('verify')){
				//用户名和密码校验
				$managerModel = D('Manager');
				//校验登陆
				$info = $managerModel->checkNamePwd($_POST['username'],$_POST['password']);

				if($info!=false){
					//保存用户信息[用户ID,用记名]
					session('uid',$info['manager_id']);
					session('username',$info['username']);
					$this->redirect(GROUP_NAME.'/Index/index');
				}else{
					echo '用户名和密码不正确!';
				}


			}else{
				echo '验证码不正确';
			}
		}


		$this->display();
	}

	//退出系统
	function out(){
		//删除session信息
		session(null);
		$this->redirect(GROUP_NAME.'/Manager/login');
	}
	
	function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}

}
