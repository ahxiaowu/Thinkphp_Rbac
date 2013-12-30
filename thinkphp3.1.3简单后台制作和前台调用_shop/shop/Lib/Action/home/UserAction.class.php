<?php

/**
 * 用户控制器
 */
class UserAction extends Action {

	//登陆操作
	function login() {
		/*
		  创建路由
		  echo U('index/index');
		 */


		$this->display();
	}

	//注册操作
	function reg() {
		$userModel = D('User');

		//表单处理
		if (!empty($_POST)) {
			$validata = $userModel->create();
			if ($validata) {
				$res = $userModel->add();
				if ($res) {
					echo 'ok';
				} else {
					echo 'fail';
				}
			} else {
				echo '表单验证有错误!<hr />';
				p($userModel->getError());
			}
		}

		$this->display();
	}

	//要把以下的魔术方法放到父类里边
	/* function __call($method, $args) {
	  echo '您调用的操作方法不存在!';
	  }
	 */
}
